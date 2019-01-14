<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendTest5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->integer('content_id')->nullable()->change();
            $table->string('content_type', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->integer('content_id')->nullable(false)->change();
            $table->string('content_type', 191)->nullable(false)->change();
        });
    }
}
