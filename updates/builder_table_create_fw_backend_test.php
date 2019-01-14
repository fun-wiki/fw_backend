<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendTest extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_test', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_test');
    }
}
