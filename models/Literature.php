<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Literature extends Model
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
    public $table = 'fw_backend_literature';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = [
        'content'
    ];

    public $belongsToMany = [
        'authors' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_literature'],
    ];

    public $hasOne = [
        'literature_type' => ['fw\Backend\Models\LiteratureType']
    ];

    public function getLiteratureTypeOptions()
    {
        return \fw\Backend\Models\LiteratureType::all()->lists('title', 'id');
    }
}
