<?php namespace fw\Backend\Models;

use Model;

class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $table = 'fw_backend_books';

    public $rules = [];

    public $permalink = ':universe.title/book/:content.title';

    protected $fillable = [
        'title'
    ];

    public $belongsTo = [
        'universe'  => ['fw\Backend\Models\Universe'],
        'series' => ['fw\Backend\Models\Category']
    ];

    public $belongsToMany = [
        'book_content' => [
            'fw\Backend\Models\Work',
            'table'    => 'fw_backend_relation_books_works',
            'key'      => 'book_id',
            'otherKey' => 'work_id'
        ],
        'author'       => [
            'fw\Backend\Models\Person',
            'table'    => 'fw_backend_relation_books_authors',
            'key'      => 'book_id',
            'otherKey' => 'person_id'
        ],
        'publisher'     => [
            'fw\Backend\Models\Organisation',
            'table'    => 'fw_backend_relation_books_publishers',
            'key'      => 'book_id',
            'otherKey' => 'organisation_id'
        ]
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function getBookTypeOptions()
    {
        $status = [
            "novel" => "Художественная книга",
            "anthology" => "Антология",
            "omnibus" => "Омнибус",
            "comic" => "Комикс",
            "artbook" => "Артбук",
            "wiki" => "Энциклопедия",
            "doc" => "Документальная книга"
        ];

        return $status;
    }

    public function beforeSave() 
    {
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
