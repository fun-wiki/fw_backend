<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationUniversesGenres extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_universes_genres', 'fw_backend_relation_universes_genres');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_universes_genres', 'fw_backend_universes_genres');
    }
}
