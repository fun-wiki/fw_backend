<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks20 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('series_id')->nullable()->change();
            $table->integer('number_in_series')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('series_id')->nullable(false)->change();
            $table->integer('number_in_series')->nullable(false)->change();
        });
    }
}
