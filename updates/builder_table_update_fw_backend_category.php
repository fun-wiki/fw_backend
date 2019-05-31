<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->string('title');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->dropColumn('title');
            $table->increments('id')->unsigned()->change();
        });
    }
}
