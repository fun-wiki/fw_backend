<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPlatforms extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_platform', 'fw_backend_platforms');
        Schema::table('fw_backend_platforms', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_platforms', 'fw_backend_platform');
        Schema::table('fw_backend_platform', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
        });
    }
}
