<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesPersons2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->integer('universe_id')->nullable()->change();
            $table->integer('person_id')->nullable()->change();
            $table->integer('literature_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->integer('universe_id')->nullable(false)->change();
            $table->integer('person_id')->nullable(false)->change();
            $table->integer('literature_id')->nullable(false)->change();
        });
    }
}
