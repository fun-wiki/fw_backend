<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendPseudos extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_pseudos');
    }
    
    public function down()
    {
        Schema::create('fw_backend_pseudos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 191);
        });
    }
}
