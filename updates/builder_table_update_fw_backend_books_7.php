<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks7 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('universe_id')->nullable()->change();
            $table->integer('book_series_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('universe_id')->nullable(false)->change();
            $table->integer('book_series_id')->nullable(false)->change();
        });
    }
}
