<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackend extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('icon')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_');
    }
}
