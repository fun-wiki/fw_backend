<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $rules = [
    ];

    public $table = 'fw_backend_person';

    public $belongsToMany = [
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_pseudos', 'key' => 'my_pseudo_id', 'otherKey' => 'my_person_id',],
        'pseudos' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_pseudos', 'key' => 'my_person_id', 'otherKey' => 'my_pseudo_id',],
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_persons_genres'],
        'universes' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_persons'],
        'personroles' => ['fw\Backend\Models\PersonRole', 'table' => 'fw_backend_persons_persons_roles']
    ];

}
