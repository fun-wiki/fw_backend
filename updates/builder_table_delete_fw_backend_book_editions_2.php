<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendBookEditions2 extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_book_editions');
    }
    
    public function down()
    {
        Schema::create('fw_backend_book_editions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('id');
        });
    }
}
