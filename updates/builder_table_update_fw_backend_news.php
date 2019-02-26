<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendNews extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->integer('universe_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_news', function($table)
        {
            $table->dropColumn('universe_id');
        });
    }
}
