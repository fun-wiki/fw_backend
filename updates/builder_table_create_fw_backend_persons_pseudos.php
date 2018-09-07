<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendPersonsPseudos extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_persons_pseudos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('person_id');
            $table->integer('pseudo_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_persons_pseudos');
    }
}
