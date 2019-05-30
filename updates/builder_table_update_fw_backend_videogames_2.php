<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->integer('universe_id');
            $table->dropColumn('slug');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->dropColumn('universe_id');
            $table->string('slug', 191);
        });
    }
}
