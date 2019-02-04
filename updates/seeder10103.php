<?php namespace fw\Backend\Updates;

use Seeder;
use Db;

class Seeder10103 extends Seeder
{
    public function run()
    {
        $content = Db::table('fw_backend_literature_type')->insert([
            [
                'title'                 => 'Роман',
                'slug'                  => 'novel',
                'description'           => ''
            ],
            [
                'title'                 => 'Повесть',
                'slug'                  => 'story',
                'description'           => ''
            ],
                        [
                'title'                 => 'Рассказ',
                'slug'                  => 'shortstory',
                'description'           => ''
            ]
       
        ]); 
    }
}