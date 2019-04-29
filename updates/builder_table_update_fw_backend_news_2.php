<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendNews2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->string('link')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->dropColumn('link');
        });
    }
}
