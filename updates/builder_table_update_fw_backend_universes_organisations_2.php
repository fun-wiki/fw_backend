<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesOrganisations2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_organisations', function($table)
        {
            $table->renameColumn('univese_id', 'universe_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_organisations', function($table)
        {
            $table->renameColumn('universe_id', 'univese_id');
        });
    }
}
