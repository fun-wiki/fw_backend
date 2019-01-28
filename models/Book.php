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

    public function getBookTypeOptions()
    {
        return 'fw\Backend\Models\BookType'::all()->lists('title', 'id');
    }

    public $belongsTo = [
        'book_type' =>['fw\Backend\Models\BookType']
    ];

    public $belongsToMany = [
        'authors' => ['fw\Backend\Models\Person' , 'table' => 'fw_backend_relation_book_person']
    ];

}
