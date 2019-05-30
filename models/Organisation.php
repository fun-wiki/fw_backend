<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

class Organisation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $table = 'fw_backend_organisations';

    public $rules = [];

    public $timestamps = false;

    public $permalink='company/:content.title';

    protected $fillable = [
        'title'
    ];

    public $belongsToMany = [
        'universe' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_organisations']
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function afterSave()
    {
        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }
        $content->permalink = Permalink::createPermalink($this);
        $content->contentable_id = $this->id;
        $this->content()->add($content);
    }
}
