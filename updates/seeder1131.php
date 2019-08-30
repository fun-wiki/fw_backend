<?php namespace fw\Backend\Updates;

use Seeder;

class Seeder1131 extends Seeder
{
    public function run()
    {
        $all_content = \Fw\Backend\Models\Universe::all();

        foreach ($all_content as $contents) {
            $contents->setting_type = 'setting';
            $contents->save();
        }
    }
}