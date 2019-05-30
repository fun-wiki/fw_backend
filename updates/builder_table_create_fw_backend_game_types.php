<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendGameTypes extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_game_types', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
            $table->string('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_game_types');
    }
}
