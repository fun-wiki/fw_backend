<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesPersons extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->integer('literature_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->dropColumn('literature_id');
        });
    }
}
