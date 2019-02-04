<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks11 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('literature_type_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('literature_type_id');
        });
    }
}
