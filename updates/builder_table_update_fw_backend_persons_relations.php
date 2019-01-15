<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPersonsRelations extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_universes_persons', 'fw_backend_persons_relations');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_persons_relations', 'fw_backend_universes_persons');
    }
}
