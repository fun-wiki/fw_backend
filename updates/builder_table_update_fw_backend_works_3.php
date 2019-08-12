<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->string('create_date');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->dropColumn('create_date');
        });
    }
}
