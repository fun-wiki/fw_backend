<?php namespace fw\Backend\Models;

use Model;

class Genre extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $rules = [];

    public $table = 'fw_backend_genres';

    public $belongsToMany = [
        'universes' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_genres']
    ];
}
