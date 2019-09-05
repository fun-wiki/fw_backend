<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationPersonsGenres extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_persons_genres', 'fw_backend_relation_persons_genres');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_persons_genres', 'fw_backend_persons_genres');
    }
}
