<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class PersonRole extends Model
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
    public $table = 'fw_backend_persons_roles';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
