<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks12 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('release_data')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('release_data');
        });
    }
}
