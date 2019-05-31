<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendContent7 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('category_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('category_id')->nullable(false)->change();
        });
    }
}
