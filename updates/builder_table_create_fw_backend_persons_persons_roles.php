<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPersonsPersonsRoles extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_persons_persons_roles', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('person_role_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_persons_persons_roles');
    }
}
