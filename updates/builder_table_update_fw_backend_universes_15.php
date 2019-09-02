<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniverses15 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->integer('complete')->default(0)->change();
            $table->integer('book')->default(0)->change();
            $table->integer('game')->default(0)->change();
            $table->integer('videogame')->default(0)->change();
            $table->renameColumn('metasetting', 'is_metasetting');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->integer('complete')->default(NULL)->change();
            $table->integer('book')->default(NULL)->change();
            $table->integer('game')->default(NULL)->change();
            $table->integer('videogame')->default(NULL)->change();
            $table->renameColumn('is_metasetting', 'metasetting');
        });
    }
}
