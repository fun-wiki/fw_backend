<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisations5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->integer('complete')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->integer('complete')->nullable(false)->change();
        });
    }
}
