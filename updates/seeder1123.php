<?php namespace fw\Backend\Updates;

use Seeder;

class Seeder1123 extends Seeder
{
    public function run()
    {
        $records = \Fw\Backend\Models\Category::all();
    
        function tree_node ($record) {
            foreach ($record->children as $children) {
                if ($children->title == 'books' ) {
                    category_node ($children);
                }
            }
        }
    
        function category_node ($record) {
            foreach ($record->children as $children) {
                $universe_cat = $children->parent->parent->id;
                $universe = \Fw\Backend\Models\Content::where('category_id', $universe_cat)->first();
                // echo $universe->title;
    
                $series = new \Fw\Backend\Models\Book;
                $series->post_type = 'series';
                $series->title = $children->title;
                $series->universe_id = $universe->contentable->id;
                $series->contentable->status = 'published';
                //dump($series);
                $series->save();
            }
        }
    
        foreach ($records as $record) {
            tree_node ($record);
        }
    }
}