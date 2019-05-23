<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendNews10 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->string('title', 191)->nullable()->change();
            $table->string('slug', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->string('title', 191)->nullable(false)->change();
            $table->string('slug', 191)->nullable(false)->change();
        });
    }
}
