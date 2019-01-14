<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendTest3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->renameColumn('content', 'contents');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->renameColumn('contents', 'content');
        });
    }
}
