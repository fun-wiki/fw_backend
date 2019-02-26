<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_news';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    protected $fillable = [
        'title', 'slug', 'description'
    ];

    public $belongsTo = [
        'universe' => ['fw\Backend\Models\Universe'],
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];
}
