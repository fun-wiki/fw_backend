<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogame2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogame', function($table)
        {
            $table->string('title')->change();
            $table->string('slug')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogame', function($table)
        {
            $table->string('title', 191)->change();
            $table->string('slug', 191)->change();
        });
    }
}
