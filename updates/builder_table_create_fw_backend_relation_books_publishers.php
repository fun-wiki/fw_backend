<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationBooksPublishers extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_books_publishers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('book_id');
            $table->integer('organisation_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_books_publishers');
    }
}