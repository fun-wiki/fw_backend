<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPseudos extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_pseudos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('name_translate')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_pseudos');
    }
}
