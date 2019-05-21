<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPermalinks extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_permalinks', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('permalink');
            $table->string('model');
            $table->integer('model_id');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_permalinks');
    }
}