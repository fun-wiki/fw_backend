<?php namespace Fw\Backend\Components;

use Db;
use Cookie;

class Views extends \Cms\Classes\ComponentBase
{
    public $post;

    const POST_VIEWED = 'post-viewed-';

    public function componentDetails()
    {
        return [
            'name'        => 'Просмотры',
            'description' => 'Счетчик просмотров'
        ];
    }

    public function onRun()
    {
        $post = $this->controller->vars['record'];
        $cookName = self::POST_VIEWED . $post->id;

        if (!is_null($post) && Cookie::get( $cookName, 0 ) == 0) {
            $this->setViews($post);

            Cookie::queue( $cookName, '1', 525000 );
        }
        
        $this->views = $this->page['views'] = $this->getViews($post);
    }

    protected function getViews($post)
    {
        $out = 0;

        if(!is_null($post->views)) {
            $out = $post->views;
        }
        return $out;
    }

    protected function setViews($post, $views = null)
    {
        if ($post->views > 0) {
            $post->views++;
            $post->save();
        } else {
            $post->views = 1;
            $post->save();
        }
    } 
} 