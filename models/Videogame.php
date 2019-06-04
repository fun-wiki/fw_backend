<?php namespace fw\Backend\Models;

use Model;

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
        'universe'  => ['fw\Backend\Models\Universe']
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
        'developer' => [
            'fw\Backend\Models\Organisation',
            'table'    => 'fw_backend_relation_videogames_developer',
            'key'      => 'videogame_id',
            'otherKey' => 'developer_id'
        ],
        'publisher' => [
            'fw\Backend\Models\Organisation',
            'table'    => 'fw_backend_relation_videogames_publisher',
            'key'      => 'videogame_id',
            'otherKey' => 'publisher_id'
        ]
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



    public function beforeSave() 
    {
        \fw\Backend\Classes\Content::bindContent($this);
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::saveContentWithCategory($this, 'videogames');
    }

    public static function getSeries($model)
    {
        $category = $model->model->content->category_id;
        // trace_log($category);
        $series = \fw\Backend\Models\Category::find($category)->children();
        return $series;
    }

    public static function setSeries()
    {
        return 'ok';
    }
}
