<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendBookEditions extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_book_editions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->nullable();
            $table->string('cover')->nullable();
            $table->string('isbn')->nullable();
            $table->string('release_date')->nullable();
            $table->boolean('first_edition')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_book_editions');
    }
}
