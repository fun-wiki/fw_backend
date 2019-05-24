<?php namespace fw\Backend\Models;

use Model;
use Illuminate\Support\Carbon;
use Event;

/**
 * Model
 */
class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \Fw\Backend\Traits\Permalink;
    
    
    public $table = 'fw_backend_news';

    public $permalink = 'news/:universe.name/:content.title';

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

    public function beforeSave()
    {
        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }
        
        $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($this);
        $content->contentable_id = $this->id;

        $this->content()->add($content);
    }

    public function filterFields($fields, $context = null)
    {
        $fields->{'content[permalink]'}->value = $this->content->permalink;
    }

    public function afterSave() 
    {
    }
}
