<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->integer('universe_id');
            $table->integer('series_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->dropColumn('universe_id');
            $table->dropColumn('series_id');
        });
    }
}
