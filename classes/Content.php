<?php

namespace Fw\Backend\Classes;

use Fw\Backend\Traits\Permalink;
use fw\Backend\Models\Category as Category;
use fw\Backend\Models\Article;

class Content
{

    public function __construct()
    {
        parent::boot();
    }

    public static function asCategory($model) // used
    {
        $category = $model->content->category;

        if (!$category) {
            $category = new \fw\Backend\Models\Category;
        }
        $category->title = $model->content->title;
        $category->save();

        $model->content->category_id = $category->id;
    }

    public  static function isMetasetting($model)
    {
        if ($model->setting_type !== 'setting') {
            if (!$model->metasettings->isEmpty()) {
                $parent_id = $model->content->category->id;
            } else {
                return;
            }
        }
    }

    public static function saveContent($model) // used
    {
        $content = $model->content;
        if ($content->permalink == '') {
            $content->permalink = Permalink::createPermalink($model);
        }
        $model->content()->add($content);
    }

    public static function saveContentWithCategory($model, $type)
    {
        if (!$model->universe_id) {
            $parent_id = null;
        } else {
            $category_id = $model->universe->content->category_id;
            $parent_id = $model->universe->content->category_id;
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

    public static function bindArticle($model) // used 
    {
        if (!$model->article) {
            $article = new Article;
        } else {
            $article = $model->article;
        }

        if ($model->title) { // Определить откуда будет браться название, дать возможность разных имен
            $article->title = $model->title;
            $article->permalink = Permalink::createPermalink($model);
        } else {
            $model->title = $article->title;
        }
        
        $model->article()->add($article);
    }

    // public static function bindCategory($model, $type) // used
    // {
    //     if (!$model->universe_id) {
    //         $parent_id = null;
    //     } else {
    //         $parent_id = $model->universe->content->category_id;
    //     }
    //     $check_category = Category::where([['parent_id', $parent_id], ['title', $type]])->get();
    //     if ($check_category->isEmpty()) {
    //         $category = new Category;
    //         $category->title = $type;
    //         $category->parent_id = $parent_id;
    //         $category->save();
    //         $model->content->category_id = $category->id;
    //     }
    //     $content = $model->content;
    //     $model->content()->add($content);
    // }

    public static  function bindCategory($model)
    {
        $type = $model->article->contentable_type;

        switch ($type) {
            case 'news':
                $parent_category = 'news';
                break;
            
            default:
                return;
                break;
        }

        if ($model->universe_id) {
            $root_category = $model->universe_id;
        } else {
            $root_category = null;
        }

        
        trace_log ($root_category);


        return;
        

        $universe_category_id = $model->universe->content->category_id;
        $parent_series_category_id = Category::where([['parent_id', $universe_category_id], ['title', $type]])->first()->id;
        $series_category = $model->series_id;
       
        if ($series_category == "-1") {
            $parrent_category = $parent_series_category_id;
        } else {
            $parrent_category = $series_category;
        }

        $check_value = Category::where([['parent_id', $parrent_category], ['title', $model->title]])->first();

        if ($model->post_type == 'series') {
            if (!$check_value) {
                $category = new Category;
                $category->title = $model->title;
                $category->parent_id = $parrent_category;
                $category->save();
                $current_category = $category->id;
            } else {
                $current_category = $check_value->id;
            }
            
            $model->content->contentable_type = 'series';
        } else {
            $current_category = $series_category;
        }

        $model->content->category_id = $current_category;
        $content = $model->content;
        // trace_log($model);
        $model->content()->add($content);
    }
}
