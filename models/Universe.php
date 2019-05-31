<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

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
        'company' => ['fw\Backend\Models\Organisation', 'table' => 'fw_backend_universes_organisations']
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function getPersonsOptions() {
        dump ($this);
    }

    public function beforeSave() 
    {
        if (!$this->content) {
            $this->content = new Content;
        }
    }

    public function afterSave()
    {
        $category = $this->content->category;
        if (!$category) {
            $category = new \fw\Backend\Models\Category;
        }
        $category->title = $this->content->title;
        $category->save();

        $content = $this->content;
        $content->permalink = Permalink::createPermalink($this);
        $content->contentable_id = $this->id;
        $content->category = $category;
        $this->title = $content->title;
        $this->content()->add($content);
    }
}
