<?php namespace fw\Backend\Models;

use Model;
use Illuminate\Support\Carbon;


/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Fw\Backend\Traits\Permalink;
    
    public $table = 'fw_backend_news';

    protected $permalink = 'news/:slug';

    public $rules = [
    ];

    protected $fillable = [
        'title', 'slug', 'description'
    ];

    public $belongsTo = [
        'universe' => ['fw\Backend\Models\Universe'],
        'user' => ['Backend\Models\User'] 
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function beforeCreate()
    {
        if (!isset($this->user_id) || empty($this->user_id)) {
            $this->user_id = 0;
        }

        if ($this->status == 1 && empty($this->published_at)) {
            $this->published_at = Carbon::now();
        }
    }
}
