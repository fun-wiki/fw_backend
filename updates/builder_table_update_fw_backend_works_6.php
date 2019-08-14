<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->string('create_date', 191)->nullable()->change();
            $table->integer('universe_id')->nullable()->change();
            $table->integer('series_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->string('create_date', 191)->nullable(false)->change();
            $table->integer('universe_id')->nullable(false)->change();
            $table->integer('series_id')->nullable(false)->change();
        });
    }
}
