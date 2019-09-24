<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendCategory6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->integer('nest_left')->nullable()->default(0);
            $table->integer('nest_right')->nullable()->default(0);
            $table->integer('nest_depth')->nullable()->default(0);
            $table->string('title', 191)->default('null')->change();
            $table->integer('parent_id')->default(0)->change();
            $table->string('alias', 191)->nullable()->default('0')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_category', function($table)
        {
            $table->dropColumn('nest_left');
            $table->dropColumn('nest_right');
            $table->dropColumn('nest_depth');
            $table->string('title', 191)->default('\'null\'')->change();
            $table->integer('parent_id')->default(NULL)->change();
            $table->string('alias', 191)->nullable(false)->default(null)->change();
        });
    }
}
