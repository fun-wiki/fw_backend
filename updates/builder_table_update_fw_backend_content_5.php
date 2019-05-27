<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendContent5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->string('status', 10)->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('status')->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
