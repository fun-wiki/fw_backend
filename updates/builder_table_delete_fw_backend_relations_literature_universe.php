<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendRelationsLiteratureUniverse extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_relations_literature_universe');
    }
    
    public function down()
    {
        Schema::create('fw_backend_relations_literature_universe', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('literature_id');
            $table->integer('universe_id');
        });
    }
}
