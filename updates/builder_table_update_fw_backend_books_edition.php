<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooksEdition extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_books', 'fw_backend_books_edition');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_books_edition', 'fw_backend_books');
    }
}
