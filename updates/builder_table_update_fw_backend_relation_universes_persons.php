<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationUniversesPersons extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_universes_persons', 'fw_backend_relation_universes_persons');
        Schema::table('fw_backend_relation_universes_persons', function($table)
        {
            $table->integer('universe_id')->default(0)->change();
            $table->integer('person_id')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_universes_persons', 'fw_backend_universes_persons');
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->integer('universe_id')->default(NULL)->change();
            $table->integer('person_id')->default(NULL)->change();
        });
    }
}
