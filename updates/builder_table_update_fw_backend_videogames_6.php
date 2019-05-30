<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->integer('developer_id');
            $table->integer('publisher_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->dropColumn('developer_id');
            $table->dropColumn('publisher_id');
        });
    }
}
