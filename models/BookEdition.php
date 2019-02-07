<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class BookEdition extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = true;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_book_editions';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $itemFormWidget;

    public $belongsTo = [
        'book_type' =>[BookType::class]
    ];

    public $belongsToMany = [
        'books' => [Book::class, 'table' => 'fw_backend_relation_book_bookeditions', 'key' => 'book_id', 'otherKey' => 'book_edition_id'],
        'universes' => [Universe::class, 'table' => 'fw_backend_relation_bookeditions_universes']
    ];
    
    public function getBookTypeOptions()
    {
        return BookType::all()->lists('title', 'id');
    }

    public function  universe() {
        return Universe::all()->lists('title', 'id');
    }

    public function filterFields($fields, $context = null)
    {
        trace_log('filtered');
    }

    public function beforeSave()
    {
    }
}
