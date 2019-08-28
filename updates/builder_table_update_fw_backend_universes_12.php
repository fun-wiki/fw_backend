<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniverses12 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->integer('complete')->default(0)->change();
            $table->integer('book')->nullable()->change();
            $table->integer('game')->nullable()->change();
            $table->integer('videogame')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->integer('complete')->default(NULL)->change();
            $table->integer('book')->nullable(false)->change();
            $table->integer('game')->nullable(false)->change();
            $table->integer('videogame')->nullable(false)->change();
        });
    }
}
