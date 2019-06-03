<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationVideogamesDeveloper extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_videogames_developer', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('videogame_id');
            $table->integer('developer_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_videogames_developer');
    }
}
