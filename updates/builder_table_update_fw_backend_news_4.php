<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendNews4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->string('link')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->string('link', 191)->change();
        });
    }
}
