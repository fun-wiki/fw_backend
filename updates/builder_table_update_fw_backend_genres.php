<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendGenres extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_', 'fw_backend_genres');
        Schema::table('fw_backend_genres', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
            $table->string('description')->change();
            $table->string('icon')->change();
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_genres', 'fw_backend_');
        Schema::table('fw_backend_', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
            $table->string('description', 191)->change();
            $table->string('icon', 191)->change();
        });
    }
}
