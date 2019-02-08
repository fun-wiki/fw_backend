<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson11 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->integer('test')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->integer('test')->nullable(false)->change();
        });
    }
}
