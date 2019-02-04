<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookSeries3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->integer('universe_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->integer('universe_id')->nullable(false)->change();
        });
    }
}
