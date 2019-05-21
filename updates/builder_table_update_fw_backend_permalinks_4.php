<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPermalinks4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalink_type')->nullable();
            $table->dropColumn('permalinks_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->dropColumn('permalink_type');
            $table->string('permalinks_type', 191)->nullable();
        });
    }
}
