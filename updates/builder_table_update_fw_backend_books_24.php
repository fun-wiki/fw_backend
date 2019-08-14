<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks24 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('title_ru');
            $table->dropColumn('universe_id');
            $table->dropColumn('series_id');
            $table->dropColumn('number_in_series');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title_ru', 191)->nullable();
            $table->integer('universe_id');
            $table->integer('series_id')->nullable();
            $table->integer('number_in_series')->nullable();
        });
    }
}
