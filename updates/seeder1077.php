<?php namespace fw\Backend\Updates;

use Seeder;
use Db;

class Seeder1077 extends Seeder
{
    public function run()
    {
        $bookTypes = Db::table('fw_backend_book_types')->insert([
            [
                'title' => 'Художественное произведение',
            ],
            [
                'title' => 'Комикс',
            ],
            [
                'title' => 'Артбук',
            ],
            [
                'title' => 'Энциклопедия',
            ],           
            [
                'title' => 'Документальная книга',
            ],      
        ]); 
    }
}