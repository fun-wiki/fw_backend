<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_book';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = [
        'content'
    ];

    public $hasOne = [
    ];

    public $belongsToMany = [
        'literature' => ['fw\Backend\Models\Literature', 'table' => 'fw_backend_relation_book_literature']
    ];

}
