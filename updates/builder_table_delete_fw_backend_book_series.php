<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendBookSeries extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_book_series');
    }
    
    public function down()
    {
        Schema::create('fw_backend_book_series', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 191);
            $table->string('slug', 191)->nullable()->default('NULL');
            $table->string('name_original', 191)->nullable()->default('NULL');
            $table->string('name_ru', 191)->nullable()->default('NULL');
            $table->integer('universe_id')->nullable()->default(NULL);
        });
    }
}
