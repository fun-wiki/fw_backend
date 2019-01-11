<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesOrganisations extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_organisations', function($table)
        {
            $table->integer('univese_id');
            $table->integer('organisation_id');
            $table->dropColumn('univeses_id');
            $table->dropColumn('organisations_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_organisations', function($table)
        {
            $table->dropColumn('univese_id');
            $table->dropColumn('organisation_id');
            $table->integer('univeses_id');
            $table->integer('organisations_id');
        });
    }
}
