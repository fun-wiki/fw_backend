<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendCareers extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_careers');
    }
    
    public function down()
    {
        Schema::create('fw_backend_careers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('career', 191);
        });
    }
}
