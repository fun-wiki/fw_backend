<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPerson extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_person', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('name_translate')->nullable();
            $table->date('birthdate')->nullable();
            $table->date('deathdata')->nullable();
            $table->string('country')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_person');
    }
}
