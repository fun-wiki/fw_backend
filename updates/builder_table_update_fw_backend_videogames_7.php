<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames7 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->string('title_ru', 191)->nullable()->change();
            $table->text('description')->nullable()->change();
            $table->text('created_data')->nullable()->change();
            $table->integer('developer_id')->nullable()->change();
            $table->integer('publisher_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_videogames', function($table)
        {
            $table->string('title_ru', 191)->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
            $table->text('created_data')->nullable(false)->change();
            $table->integer('developer_id')->nullable(false)->change();
            $table->integer('publisher_id')->nullable(false)->change();
        });
    }
}
