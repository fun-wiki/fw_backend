<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPostview extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_postview', function($table)
        {
            $table->engine = 'InnoDB';
            $table->string('permalink');
            $table->integer('views');
            $table->primary(['permalink']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_postview');
    }
}
