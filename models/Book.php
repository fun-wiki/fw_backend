<?php

namespace fw\Backend\Models;

use Model;
use Yaml;

class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;
    public $permalink = ':universe.title/books/:content.title';
    public $table = 'fw_backend_books';
    public $rules = [];

    public function getWorkTypeOptions($value, $formData)
    {
        return Yaml::parseFile(dirname(__FILE__).'\book\options\work_type.yaml');
    }

    public function getBookTypeOptions()
    {
        return Yaml::parseFile(dirname(__FILE__).'\book\options\book_type.yaml');
    }

    public $belongsTo = [
        'universe'  => ['fw\Backend\Models\Universe'],
        'series' => ['fw\Backend\Models\Category']
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $belongsToMany = [
        'author' => [
            'fw\Backend\Models\Person',
            'table'    => 'fw_backend_relation_works_authors',
            'key'      => 'work_id',
            'otherKey' => 'person_id'
        ],
        'illustrator' => [
            'fw\Backend\Models\Person',
            'table'    => 'fw_backend_relation_works_illustrators',
            'key'      => 'work_id',
            'otherKey' => 'person_id'
        ],
        'genres' => [
            'fw\Backend\Models\Genre',
            'table' => 'fw_backend_relation_works_genres',
            'key'      => 'work_id',
            'otherKey' => 'genre_id'
        ],
        'book_content' => [
            'fw\Backend\Models\Book',
            'table'    => 'fw_backend_relation_works_works',
            'key'      => 'parent_work_id',
            'otherKey' => 'work_id'
        ],
        'book_editions' => [
            'fw\Backend\Models\BookEdition',
            'table'    => 'fw_backend_relation_books_works',
            'key'      => 'work_id',
            'otherKey' => 'book_id'
        ]
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function beforeSave()
    {

        $universe_id = $this->universe_id;

        if ($this->book_type == 'novel') {
            $this->book_content = [];
        }

        if ($this->book_type == 'anthology') {
            foreach ($this->book_content as $content) {
                $work = Book::find($content->id);
                $work->universe_id = $universe_id;
                $work->series_id = $this->series_id;
                $work->number_in_series = $this->number_in_series;
                $work->in_anthology = true;
                $work->save();
            }
        }

        $add_books = \fw\Backend\Models\Universe::find($universe_id);
        $add_books->book = 1;
        $add_books->save();

        \fw\Backend\Classes\Content::bindContent($this);
        \fw\Backend\Classes\Content::hasSeries($this, 'books');
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::saveContent($this);
    }

    public static function getSeries($model)
    {
        $universe_id = $model->config->parentForm->getField('universe')->value;

        if ($universe_id) {
            $category_id = Universe::find($universe_id)->content->category_id;
            $category = Category::where([['title', 'books'], ['parent_id', $category_id]])->first();
            if (!$category) {
                $new_category = new Category;
                $new_category->title = 'books';
                $new_category->parent_id = $category_id;
                $new_category->save();
                $category = $new_category->id;
            } else {
                $category = $category->id;
            }
        } else {
            $category = false;
        }

        if ($category) {
            $series = Category::find($category)->children;
        } else {
            return [];
        }

        return $series;
    }
}
