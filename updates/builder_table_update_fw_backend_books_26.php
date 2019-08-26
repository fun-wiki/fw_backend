<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks26 extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_works', 'fw_backend_books');
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('universe_id')->default(0)->change();
            $table->integer('series_id')->default(0)->change();
            $table->integer('number_in_series')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_books', 'fw_backend_works');
        Schema::table('fw_backend_works', function($table)
        {
            $table->integer('universe_id')->default(NULL)->change();
            $table->integer('series_id')->default(NULL)->change();
            $table->integer('number_in_series')->default(NULL)->change();
        });
    }
}
