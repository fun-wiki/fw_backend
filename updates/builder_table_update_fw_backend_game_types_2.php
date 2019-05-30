<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendGameTypes2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_game_types', function($table)
        {
            $table->string('title', 191)->nullable()->change();
            $table->dropColumn('id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_game_types', function($table)
        {
            $table->string('title', 191)->nullable(false)->change();
            $table->integer('id');
        });
    }
}
