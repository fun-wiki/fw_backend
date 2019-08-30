<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationUniversesUniverses extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_universes_universes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('universe_id')->nullable();
            $table->integer('metasseting_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_universes_universes');
    }
}
