<?php namespace fw\Backend\Updates;

use Seeder;

class Seeder1129 extends Seeder
{
    public function run()
    {
        $all_news = \Fw\Backend\Models\Article::with('content')->where('content_type', 'news')->get();
        
        // trace_log($all_news->toArray());
        
        foreach ($all_news as $news) {
            
            $old_universe_id = $news->content->universe_id;
            $new_universe_id = $news->category_id;
            
            trace_log('old '.$old_universe_id.' -> new '.$new_universe_id);
        }
    }
}