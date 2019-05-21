<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPermalinks3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalinks_type')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalinks_type', 191)->nullable(false)->change();
        });
    }
}
