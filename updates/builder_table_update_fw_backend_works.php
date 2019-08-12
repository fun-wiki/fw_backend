<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendWorks extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->string('title', 255)->nullable();
            $table->string('title_ru', 255)->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_works', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('title_ru');
        });
    }
}
