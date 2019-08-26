<?php

namespace Fw\Backend\Classes;

use Fw\Backend\Traits\Permalink;
use fw\Backend\Models\Category as Category;
use fw\Backend\Models\Content as ContentModel;

class Content
{

    public function __construct()
    {
        parent::boot();
    }

    public static function saveContent($model)
    {
        $content = $model->content;
        $content->permalink = Permalink::createPermalink($model);
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

    public static function bindCategory($model, $type)
    {
        if (!$model->universe_id) {
            $parent_id = null;
        } else {
            $parent_id = $model->universe->content->category_id;
        }
        $check_category = Category::where([['parent_id', $parent_id], ['title', $type]])->get();
        if ($check_category->isEmpty()) {
            $category = new Category;
            $category->title = $type;
            $category->parent_id = $parent_id;
            $category->save();
            $model->content->category_id = $category->id;
        }
        $content = $model->content;
        $model->content()->add($content);
    }

    public static  function hasSeries($model, $type)
    {
        $universe_category_id = $model->universe->content->category_id;
        $parent_series_category_id = Category::where([['parent_id', $universe_category_id], ['title', $type]])->first();
        $series_category = $model->series_id;
        $check_value = Category::find($series_category); // проверяем есть ли раздел
        if ($series_category !== "-1") {
            if (!$check_value) {
                $category = new Category;
                $category->title = $series_category;
                $category->parent_id = $parent_series_category_id->id;
                $category->save();
                $current_category = $category->id;
                $model->series_id = $category->id;
            } else {
                $current_category = $check_value->id;
            }
        } else {
            $current_category = $parent_series_category_id->id;
        }
        $model->content->category_id = $current_category;
        $content = $model->content;
        $model->content()->add($content);
    }
}
