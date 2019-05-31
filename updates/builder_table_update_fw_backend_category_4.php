<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->string('title', 191)->nullable()->change();
            $table->integer('parent_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->string('title', 191)->nullable(false)->change();
            $table->integer('parent_id')->nullable(false)->change();
        });
    }
}
