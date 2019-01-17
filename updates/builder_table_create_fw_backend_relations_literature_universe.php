<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationsLiteratureUniverse extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relations_literature_universe', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('literature_id');
            $table->integer('universes_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relations_literature_universe');
    }
}
