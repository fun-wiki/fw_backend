<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendUniversesGenres extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_universes_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('universe_id');
            $table->integer('genre_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_universes_genres');
    }
}
