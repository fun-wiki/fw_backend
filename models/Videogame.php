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
            'fw\Backend\Models\Company',
            'table'    => 'fw_backend_relation_videogames_developer',
            'key'      => 'videogame_id',
            'otherKey' => 'developer_id'
        ],
        'publisher' => [
            'fw\Backend\Models\Company',
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
        \fw\Backend\Classes\Content::hasSeries($this, 'videogames');

        $universe_id = $this->universe_id;
        $add_books = \fw\Backend\Models\Universe::find($universe_id);
        $add_books->videogame = 1;
        $add_books->save();
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::saveContent($this);
    }

    public static function getSeries($model)
    {
        $universe_id = $model->config->parentForm->getField('universe')->value;

        if ($universe_id) {
            $category_id = Universe::find($universe_id)->content->category_id;
            $category = Category::where([['title', 'videogames'], ['parent_id', $category_id]])->first();
            if (!$category) {
                $new_category = new Category;
                $new_category->title = 'videogames';
                $new_category->parent_id = $category_id;
                $new_category->save();
                $category = $new_category->id;
            } else {
                $category = $category->id;
            }
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
        // if ($this->series_id !== null) {
        //     $check_value = Category::find($this->series_id);

        //     if ($check_value == null) {
        //         $universe_id = $this->universe_id;

        //         if ($universe_id) {
        //             $category_id = Universe::find($universe_id)->content->category_id;
        //             $parrent_category = Category::where([['title', 'videogames'], ['parent_id', $category_id]])->first()->id;
                   
        //             $category = new Category;
        //             $category->title = $this->series_id;
        //             $category->parent_id = $parrent_category;
        //             $category->save();
        //         } 
        //     } 
        // } else {
            
        // }
        


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
