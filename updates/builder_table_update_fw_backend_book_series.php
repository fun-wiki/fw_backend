<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookSeries extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->integer('universe_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->dropColumn('universe_id');
        });
    }
}
