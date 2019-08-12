<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationBooksWorks extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_books_works', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('book_id');
            $table->integer('work_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_books_works');
    }
}
