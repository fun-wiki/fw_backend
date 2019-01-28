<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('book_series_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('book_series_id');
        });
    }
}
