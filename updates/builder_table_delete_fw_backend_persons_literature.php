<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendPersonsLiterature extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_persons_literature');
    }
    
    public function down()
    {
        Schema::create('fw_backend_persons_literature', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('literature_id');
        });
    }
}
