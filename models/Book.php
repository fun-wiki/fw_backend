<?php namespace fw\Backend\Models;

use Model;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Model
 */
class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $table = 'fw_backend_books';

    public $rules = [];

    public $jsonable = [
        'editions'
    ];

    public function getBookTypeOptions()
    {
        return 'fw\Backend\Models\BookType'::all()->lists('title', 'id');
    }

    public $belongsTo = [
        'book_type' =>['fw\Backend\Models\BookType'],
        'universe' => ['fw\Backend\Models\Universe'],
        'book_series' => ['fw\Backend\Models\BookSeries']
    ];

    public $belongsToMany = [
        'authors' => ['fw\Backend\Models\Person' , 'table' => 'fw_backend_relation_book_person'],
        'publisher' => ['fw\Backend\Models\Organisation' , 'table' => 'fw_backend_relation_book_person'],
        'pseudos' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_relation_persons_pseudos', 'key' => 'person_id', 'otherKey' => 'pseudo_id',],
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_relation_book_genres'],
    ];

    public function listSeries($fieldName, $value, $formData)
    {
        $bookseries = [];
        $collection = Universe::where('id', $formData->universe->id)->get();

        if (isset($collection)) {
            foreach ($collection[0]->bookseries as $bookserie) {
                $bookseries[$bookserie->id] = $bookserie->title;
            }
        }
        return $bookseries;
    }

    public function filterFields($fields, $context = null)
    {
        if (isset($fields->title_ru)) {
            if ($fields->title_ru->value != null) {
                $fields->title->value = $fields->title_ru->value;
            } else {
                $fields->title->value = $fields->title_original->value;
            }
            $fields->slug->value = str_slug($fields->title->value);
        }
    }

}