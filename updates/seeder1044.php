<?php namespace fw\Backend\Updates;

use Seeder;
use Db;

class Seeder1044 extends Seeder
{
    public function run()
    {
    {
        $personRoles = Db::table('fw_backend_persons_roles')->insert([
            [
                'title'                 => 'Геймдизайнер',
                'slug'                  => 'gamedesigner',
            ]
        ]); 

    }
    }
}