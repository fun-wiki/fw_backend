<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendNews14 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}