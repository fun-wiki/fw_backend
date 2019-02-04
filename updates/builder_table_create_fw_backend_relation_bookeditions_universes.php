<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationBookeditionsUniverses extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_bookeditions_universes', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('universe_id');
            $table->integer('book_edition_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_bookeditions_universes');
    }
}
