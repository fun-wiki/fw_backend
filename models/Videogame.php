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
        \fw\Backend\Classes\Content::bindCategory($this, 'videogames');
    }

    public function afterSave()
    {
        $content = \fw\Backend\Classes\Content::hasSeries($this);
        \fw\Backend\Classes\Content::saveContent($content);
    }

    public static function getSeries($model)
    {
        $universe_id = $model->config->parentForm->getField('universe')->value;

        if ($universe_id) {
            $category_id = Universe::find($universe_id)->content->category_id;
            $category = Category::where([['title', 'videogames'], ['parent_id', $category_id]])->first()->id;
        } else {
            $category = false;
        }

        if ($category) {
            $series = Category::find($category)->children;
        } else {
            return [];
        }
        
        return $series;
    }

    public static function setSeries($model, $value)
    {
        $check_value = Category::find($value);

        $universe_id = $model->config->parentForm->getField('universe')->value;
        if ($universe_id) {
            $category_id = Universe::find($universe_id)->content->category_id;
            $parrent_category = Category::where([['title', 'videogames'], ['parent_id', $category_id]])->first()->id;
        } else {
            $parrent_category = null;
        }

        if ($check_value) {
            return $value;
        } else {
            $category = new Category;
            $category->title = $value;
            $category->parent_id = $parrent_category;
            $category->save();
            return $category->id;
        }
        // $universe_id = $model->config->parentForm->getField('universe')->value;
        // trace_log('id'.$universe_id);
        // $category_id = Universe::find($universe_id)->content->category_id;
        // trace_log($category_id);
        // $parent_category = Category::where([['title', 'videogames'], ['parent_id', $category_id]])->first()->id;

        // if (!isset($value[0])) {
        //     $result = $parent_category;
        // } else {
        //     $result = Category::find($value);

        //     if ($result->isEmpty()) {
        //         $category = new Category;
        //         $category->title = $value[0];
        //         $category->parent_id = $parent_category;
        //         $category->save();
    
        //         $result = $category->id;
        //     } else {
        //         $result = $result->id;
        //     }
        // }
        return; //$result;
    }
}
