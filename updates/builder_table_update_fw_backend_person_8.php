<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson8 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->string('name', 191)->nullable()->change();
            $table->string('slug', 191)->nullable()->change();
            $table->boolean('is_pseudo')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->string('name', 191)->nullable(false)->change();
            $table->string('slug', 191)->nullable(false)->change();
            $table->boolean('is_pseudo')->nullable(false)->change();
        });
    }
}
