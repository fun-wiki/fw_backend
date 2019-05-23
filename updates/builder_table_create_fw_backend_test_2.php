<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendTest2 extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_test', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('test_text');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_test');
    }
}
