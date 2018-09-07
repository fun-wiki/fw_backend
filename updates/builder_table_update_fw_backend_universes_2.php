<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniverses2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->string('cover')->nullable();
            $table->string('logo')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->dropColumn('cover');
            $table->string('logo', 191)->change();
        });
    }
}
