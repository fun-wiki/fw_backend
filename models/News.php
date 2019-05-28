<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $table = 'fw_backend_news';

    public $permalink = 'news/:content.title';

    public $rules = [
    ];

    public $timestamps = false;

    protected $fillable = [
        'title',
        'slug', 
        'description'
    ];

    public $belongsTo = [
        'universe' => ['fw\Backend\Models\Universe'],
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function beforeSave()
    {
        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }
        $content->permalink = Permalink::createPermalink($this);
        $content->contentable_id = $this->id;
        $this->title = $content->title;
        $this->content()->add($content);
    }
}
