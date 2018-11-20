<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisatons3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_organisatons', function($table)
        {
            $table->string('open_date')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_organisatons', function($table)
        {
            $table->date('open_date')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
