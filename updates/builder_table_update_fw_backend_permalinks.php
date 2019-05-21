<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPermalinks extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->string('permalink_type');
            $table->renameColumn('id', 'permalink_id');
            $table->dropColumn('model');
            $table->dropColumn('model_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_permalinks', function($table)
        {
            $table->dropColumn('permalink_type');
            $table->renameColumn('permalink_id', 'id');
            $table->string('model', 191);
            $table->integer('model_id');
        });
    }
}
