<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Test extends Model
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
    public $table = 'fw_backend_test';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = [
        'content'
    ];

    // public $morphTo = [
    //     'content' => []
    // ];

    public function afterSave()
    {
        $content = new \fw\Backend\Models\Genre;
       // trace_log($this->content);
        foreach ($this->content as $key => $value) {
            $content->$key = $value;
        }
        // trace_log($content);
        // $content->($this->content);
        $content->save();
        $this->content_id = $content->id;

    }
}
