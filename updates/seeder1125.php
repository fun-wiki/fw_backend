<?php namespace fw\Backend\Updates;

use Seeder;

class Seeder1125 extends Seeder
{
    public function run()
    {
        // trace_log('seed');
        $all_category = \Fw\Backend\Models\Category::all();
        
        function alias($category, $parent_title)
        {
            foreach ($category as $content) {
                $content->alias = $parent_title.'/'.$content->title;
                $content->save();
                if ($content->children) {
                    alias ($content->children, $content->alias);
                }
            }
        }
        
        foreach ($all_category as $content) {
            $parent_title = $content->title;
            if ($content->parent_id == null) {
                $content->alias = $parent_title;
                $content->save();
                if ($content->children) {
                    alias ($content->children, $parent_title);
                }
            }
        }


    }
}