<?php namespace Fw\Backend\Classes;

use Fw\Backend\Traits\Permalink;
use fw\Backend\Models\Category as Category;
use fw\Backend\Models\Content as ContentModel;

class Content
{

    public function __construct()
    {
        parent::boot();
    }

    public static function saveContent($model) {
        $content = $model->content;
        $content->permalink = Permalink::createPermalink($model);
        $model->content()->add($content);
    }

    public static function saveContentWithCategory($model, $type) {
        // trace_log($model);
        if (!$model->universe_id) {
            $parent_id = null;
        } else {
            $category_id = $model->universe->content->category_id;
            $parent_id = $model->universe->content->category_id;

            trace_log('category'.$category_id.'  parent_id'.$parent_id);

            $category = Category::where([['parent_id', $category_id], ['title', $type]])->get();

            if ($category->isEmpty()) {
                $category = new Category;
                $category->title = $type;
                $category->parent_id = $parent_id;
                $category->save();

                $model->content->category_id = $category->id;
            } else {
                $model->content->category_id = $category[0]->id;
            }
        }
        
        $content = $model->content;
        $content->permalink = Permalink::createPermalink($model);
        $model->content()->add($content);
    }

    public static function bindContent($model) 
    {
        if (!$model->content) {
            $content = new ContentModel;
        } else {
            $content = $model->content;
        }

        if ($content->title) {
            $model->title = $content->title;
        } else {
            $content->title = $model->title;
        }

        $model->content()->add($content);
    }
}