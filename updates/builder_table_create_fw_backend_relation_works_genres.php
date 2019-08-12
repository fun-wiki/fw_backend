<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationWorksGenres extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_works_genres', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('work_id');
            $table->integer('genre_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_works_genres');
    }
}
