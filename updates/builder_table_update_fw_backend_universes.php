<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniverses extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->string('logo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->dropColumn('logo');
        });
    }
}
