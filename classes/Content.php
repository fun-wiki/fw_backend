<?php namespace Fw\Backend\Classes;

use Fw\Backend\Traits\Permalink;
use fw\Backend\Models\Category as Category;
use fw\Backend\Models\Content as ContentModel;

class Content
{

    public static function saveContent(Model $model) {

    }

    public static function saveContentWithCategory($model, $type) {
        $category_isset = Category::where([['parent_id', $model->universe->content->category->id], ['title', $type]])->get();

        $category = $model->content->category;
        
        if (!$category)  {
            if (!isset($category_isset[0]->id)) {
                $category = new Category;
                $category->title = $type;
                $category->parent_id = $model->universe->content->category->id;
                $category->save();
            } else {
                $category = $category_isset[0];
            }
        } else {
            $category = $category_isset[0];
        }

        $content = $model->content;
        $content->category_id = $category->id;
        $model->content()->add($content);
        $content->permalink = Permalink::createPermalink($model);
        $model->content()->add($content);
    }

    public static function createContent($model) 
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
    }
}