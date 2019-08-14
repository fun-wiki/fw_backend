<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationWorksWorks extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_works_works', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('parent_work_id');
            $table->integer('work_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_works_works');
    }
}
