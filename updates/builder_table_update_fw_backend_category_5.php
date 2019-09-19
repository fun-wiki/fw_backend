<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->string('alias');
            $table->string('title', 191)->default('null')->change();
            $table->integer('parent_id')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->dropColumn('alias');
            $table->string('title', 191)->default('NULL')->change();
            $table->integer('parent_id')->default(NULL)->change();
        });
    }
}
