<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title_original')->change();
            $table->string('title_ru')->change();
            $table->renameColumn('book_types_id', 'book_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title_original', 191)->change();
            $table->string('title_ru', 191)->change();
            $table->renameColumn('book_type_id', 'book_types_id');
        });
    }
}
