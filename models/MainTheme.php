<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class MainTheme extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_main_theme';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];
}
