<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendGameTypes3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_game_types', function($table)
        {
            $table->increments('id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_game_types', function($table)
        {
            $table->dropColumn('id');
        });
    }
}
