<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->integer('sort_order');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->dropColumn('sort_order');
        });
    }
}
