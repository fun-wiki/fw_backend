<?php namespace fw\Backend\Updates;

use Seeder;
use Fw\Backend\Models\PersonRole;
use Db;


class Seeder1042 extends Seeder
{
    public function run()
    
    {
        $personRoles = Db::table('fw_backend_persons_roles')->insert([
            [
                'title'                 => 'Сценарист',
                'slug'                  => 'screenwriter',
            ]
        ]); 

    }
}