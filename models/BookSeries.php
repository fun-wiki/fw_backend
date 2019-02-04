<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class BookSeries extends Model
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
    public $table = 'fw_backend_book_series';

    public $fillable = [
        'title'
    ];

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'universe' => 'fw\Backend\Models\Universe'
    ];

}
