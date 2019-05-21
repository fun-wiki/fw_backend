<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Permalink extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_permalinks';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    
    protected $fillable = [
        'model',
        'model_id',
        'permalink'
    ];

    public $morphTo = [
        'permalinks' => []
    ];
}
