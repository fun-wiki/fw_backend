<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->string('work_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->dropColumn('work_type');
        });
    }
}
