<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_book', 'fw_backend_books');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_books', 'fw_backend_book');
    }
}
