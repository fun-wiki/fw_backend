<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Organisation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    public $table = 'fw_backend_organisations';

    public $rules = [];

    public $timestamps = true;

    protected $fillable = [
        'title'
    ];

    public $belongsToMany = [
        'universe' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_organisations']
    ];
}
