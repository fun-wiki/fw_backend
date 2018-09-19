<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPersonsGenres extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_persons_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('genre_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_persons_genres');
    }
}
