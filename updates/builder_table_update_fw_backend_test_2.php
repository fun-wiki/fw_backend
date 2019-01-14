<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendTest2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->renameColumn('model_id', 'content_id');
            $table->renameColumn('model_type', 'content_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->renameColumn('content_id', 'model_id');
            $table->renameColumn('content_type', 'model_type');
        });
    }
}
