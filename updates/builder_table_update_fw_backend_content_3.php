<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendContent3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->renameColumn('content_type', 'contentable_type');
            $table->renameColumn('content_id', 'contentable_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->renameColumn('contentable_type', 'content_type');
            $table->renameColumn('contentable_id', 'content_id');
        });
    }
}
