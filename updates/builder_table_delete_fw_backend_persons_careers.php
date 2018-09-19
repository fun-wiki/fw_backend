<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendPersonsCareers extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_persons_careers');
    }
    
    public function down()
    {
        Schema::create('fw_backend_persons_careers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('career_id');
        });
    }
}
