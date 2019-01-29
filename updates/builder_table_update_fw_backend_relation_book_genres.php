<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationBookGenres extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_realation_book_genres', 'fw_backend_relation_book_genres');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_book_genres', 'fw_backend_realation_book_genres');
    }
}
