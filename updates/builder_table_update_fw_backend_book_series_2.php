<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookSeries2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->string('slug', 191)->nullable()->change();
            $table->string('name_original', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_series', function($table)
        {
            $table->string('slug', 191)->nullable(false)->change();
            $table->string('name_original', 191)->nullable(false)->change();
        });
    }
}
