<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendLiteratureType extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_literature_type');
    }
    
    public function down()
    {
        Schema::create('fw_backend_literature_type', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 191);
            $table->string('slug', 191);
            $table->text('description');
        });
    }
}
