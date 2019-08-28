<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCompany extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_organisations', 'fw_backend_company');
        Schema::table('fw_backend_company', function($table)
        {
            $table->integer('complete')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_company', 'fw_backend_organisations');
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->integer('complete')->default(NULL)->change();
        });
    }
}
