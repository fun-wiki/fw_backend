<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendOrganisatons extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_organisatons', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('name');
            $table->string('name_ru')->nullable();
            $table->date('open_date');
            $table->date('closed_date')->nullable();
            $table->string('country')->nullable();
            $table->text('description');
            $table->string('official_site')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_organisatons');
    }
}
