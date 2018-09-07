<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesGenres extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_genres', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_genres', function($table)
        {
            $table->increments('id')->unsigned()->change();
        });
    }
}
