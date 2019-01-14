<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendTestpost extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_testpost', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('model_id');
            $table->string('model_type');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_testpost');
    }
}
