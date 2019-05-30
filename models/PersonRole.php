<?php namespace fw\Backend\Models;

use Model;

class PersonRole extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $table = 'fw_backend_persons_roles';

    public $rules = [];

    public $belongsToMany = [
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_persons_roles']
    ];
}
