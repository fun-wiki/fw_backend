<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendBookSeries extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_book_series', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('name_original');
            $table->string('name_ru')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_book_series');
    }
}
