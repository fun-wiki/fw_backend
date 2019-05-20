<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogame extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogame', function($table)
        {
            $table->string('title');
            $table->string('slug');
            $table->increments('id')->unsigned(false)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogame', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->increments('id')->unsigned()->change();
        });
    }
}
