<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationsBookseriesUniverse extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relations_bookseries_universe', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('universe_id');
            $table->integer('book_series_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relations_bookseries_universe');
    }
}
