<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendContent8 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('views')->default(0);
            $table->integer('author_id')->default(0)->change();
            $table->integer('contentable_id')->default(0)->change();
            $table->integer('category_id')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->dropColumn('views');
            $table->integer('author_id')->default(NULL)->change();
            $table->integer('contentable_id')->default(NULL)->change();
            $table->integer('category_id')->default(NULL)->change();
        });
    }
}
