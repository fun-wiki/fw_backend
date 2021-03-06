<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendCareers extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_careers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('career');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_careers');
    }
}
