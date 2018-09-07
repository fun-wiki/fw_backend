<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendUniverses extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_universes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->string('name_translate')->nullable();
            $table->string('description')->nullable();
            $table->integer('created_year')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_universes');
    }
}
