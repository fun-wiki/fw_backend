<?php namespace fw\Backend\Models;

use Model;
use fw\Backend\Models\Content;
use Fw\Backend\Traits\Permalink;

class Videogame extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $table = 'fw_backend_videogames';

    public $rules = [];

    public $permalink = ':universe.title/videogames/:content.title';

    protected $fillable = [
        'title'
    ];

    public $belongsTo = [
        'universe' => 'fw\Backend\Models\Universe'
    ];

    public $belongsToMany = [
        'platform' => [
            'fw\Backend\Models\Platform',
            'table'    => 'fw_backend_relation_videogames_platforms',
            'key'      => 'videogame_id',
            'otherKey' => 'platform_id'
        ],
        'genres' => [
            'fw\Backend\Models\GameType',
            'table'    => 'fw_backend_relation_videogames_gametypes',
            'key'      => 'videogame_id',
            'otherKey' => 'gametype_id'
        ],
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $attachMany = [
        'screenshots' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];



    public function beforeSave() {

        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }

        if ($content->title) {
            $this->title = $content->title;
        } else {
            $content->title = $this->title;
        }
    }

    public function afterSave()
    {
        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }
        $content->permalink = Permalink::createPermalink($this);
        $this->content()->add($content);
    }
}
