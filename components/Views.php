<?php namespace Fw\Backend\Components;

use Db;

class Views extends \Cms\Classes\ComponentBase
{
    public $post;

    public function componentDetails()
    {
        return [
            'name'        => 'Просмотры',
            'description' => 'Счетчик просмотров'
        ];
    }

    // public function defineProperties()
    // {
    //     // return [
    //     //     'slug' => [
    //     //         'title'       => 'rainlab.blog::lang.settings.post_slug',
    //     //         'description' => 'rainlab.blog::lang.settings.post_slug_description',
    //     //         'default'     => '{{ :slug }}',
    //     //         'type'        => 'string'
    //     //     ]
    //     // ];
    // }

    public function onRun()
    {
        $this->views = $this->page['views'] = $this->getViews();
    }

    protected function loadPost()
    {
        $post = \fw\Backend\Models\Content::where('permalink', '=', $_SERVER['REQUEST_URI'])->first();
        return $post;
    }

    protected function getViews()
    {
        $out = 0;
        $post = $this->loadPost();

        if(!is_null($post)) {
            $obj = Db::table('fw_backend_postview')
                ->where('permalink', $post->permalink);

            if ($obj->count() > 0) {
                $out = $obj->first()->views;
            }
        }
        
        return $out;
    }
} 