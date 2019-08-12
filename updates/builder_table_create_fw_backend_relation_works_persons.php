<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationWorksPersons extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_works_persons', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('work_id');
            $table->integer('person_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_works_persons');
    }
}
