<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Organisation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_organisations';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsToMany = [
        'universe' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_organisations']
    ];
}
