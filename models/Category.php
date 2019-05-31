<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    // use \October\Rain\Database\Traits\Sortable;
    use \October\Rain\Database\Traits\SimpleTree;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    protected $fillable = [
        'title'
    ];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_category';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
