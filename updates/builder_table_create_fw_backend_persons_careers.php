<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPersonsCareers extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_persons_careers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('careers_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_persons_careers');
    }
}
