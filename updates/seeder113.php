<?php namespace fw\Backend\Updates;

use Seeder;

class Seeder113 extends Seeder
{
    public function run()
    {
        trace_log('seed');
        $all_content = \Fw\Backend\Models\Content::all();

        foreach ($all_content as $contents) {
            $content = \Fw\Backend\Models\Content::find($contents->id);
            if ($content->contentable_type == 'book') {
                $content->contentable_type = 'book_edition';
            }
            if ($content->contentable_type == 'work') {
                $content->contentable_type = 'book';
            }
            $content->save();
        }
    }
}