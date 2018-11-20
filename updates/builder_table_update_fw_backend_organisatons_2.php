<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisatons2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_organisatons', function($table)
        {
            $table->string('logo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_organisatons', function($table)
        {
            $table->dropColumn('logo');
        });
    }
}
