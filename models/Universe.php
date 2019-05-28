<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

/**
 * Model
 */
class Universe extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $rules = [];

    public $permalink = ':content.title';

    public $table = 'fw_backend_universes';

    public $hasMany = [
        'literature' => ['fw\Backend\Models\Literature'],
        'bookseries' => ['fw\Backend\Models\BookSeries']
    ];
    
    public $belongsToMany = [
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_universes_genres', 'foreignKey' => 'genre_id'],
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_universes_persons'],
        'organisations' => ['fw\Backend\Models\Organisation', 'table' => 'fw_backend_universes_organisations']
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
        $this->content()->add($content);
    }
}
