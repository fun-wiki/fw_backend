<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->renameColumn('sort_order', 'parent_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->renameColumn('parent_id', 'sort_order');
        });
    }
}
