<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames9 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->integer('number_in_series')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->dropColumn('number_in_series');
        });
    }
}
