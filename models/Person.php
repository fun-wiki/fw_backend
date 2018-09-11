<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_person';

    public $belongsToMany = [
        'pseudo' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_pseudos', 'key' => 'my_person_id', 'otherKey' => 'my_pseudo_id',]
    ];

}
