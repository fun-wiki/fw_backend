<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendContent4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('author_id')->nullable()->change();
            $table->integer('contentable_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_content', function($table)
        {
            $table->integer('author_id')->nullable(false)->change();
            $table->integer('contentable_id')->nullable(false)->change();
        });
    }
}
