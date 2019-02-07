<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisations3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->integer('complete');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->dropColumn('complete');
        });
    }
}
