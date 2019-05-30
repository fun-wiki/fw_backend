<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->string('title_ru');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->dropColumn('title_ru');
        });
    }
}
