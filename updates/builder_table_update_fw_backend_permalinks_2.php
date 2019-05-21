<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPermalinks2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalinks_type');
            $table->renameColumn('permalink_id', 'permalinks_id');
            $table->dropColumn('permalink_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->dropColumn('permalinks_type');
            $table->renameColumn('permalinks_id', 'permalink_id');
            $table->string('permalink_type', 191);
        });
    }
}
