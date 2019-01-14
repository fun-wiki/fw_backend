<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendTest extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->integer('model_id');
            $table->string('model_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_test', function($table)
        {
            $table->dropColumn('model_id');
            $table->dropColumn('model_type');
        });
    }
}
