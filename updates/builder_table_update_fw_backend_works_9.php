<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks9 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->boolean('in_anthology')->default(false);
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->dropColumn('in_anthology');
        });
    }
}
