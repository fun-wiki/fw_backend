<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks21 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('book_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('book_type');
        });
    }
}
