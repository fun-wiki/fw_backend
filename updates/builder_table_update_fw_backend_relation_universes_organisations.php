<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationUniversesOrganisations extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_universes_organisations', 'fw_backend_relation_universes_organisations');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_universes_organisations', 'fw_backend_universes_organisations');
    }
}
