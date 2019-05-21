<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPermalinks5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalinks_type')->nullable();
            $table->dropColumn('permalink_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->dropColumn('permalinks_type');
            $table->string('permalink_type', 191)->nullable();
        });
    }
}
