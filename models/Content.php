<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Content extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_content';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $belongsTo = [
        'author' => ['Backend\Models\User'] 
    ];

    public $morphTo = [
        'contentable' => []
    ];

    public function beforeSave()
    {
        if (!isset($this->author_id) || empty($this->author_id)) {
            $this->author_id = 1;
        }
    }
}
