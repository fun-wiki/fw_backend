<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationVideogamesPlatforms extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_videogames_platforms', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('videogame_id');
            $table->integer('platform_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_videogames_platforms');
    }
}
