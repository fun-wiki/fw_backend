<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendRelationBookLiterature extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_relation_book_literature');
    }
    
    public function down()
    {
        Schema::create('fw_backend_relation_book_literature', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('book_id');
            $table->integer('literature_id');
        });
    }
}
