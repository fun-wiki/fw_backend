<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendVideogame extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_videogame', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_videogame');
    }
}
