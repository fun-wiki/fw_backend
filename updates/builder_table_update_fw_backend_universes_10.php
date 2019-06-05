<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniverses10 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->string('setting_type')->nullable();
            $table->renameColumn('name_translate', 'title_ru');
            $table->renameColumn('created_year', 'created_at_date');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes', function($table)
        {
            $table->dropColumn('setting_type');
            $table->renameColumn('title_ru', 'name_translate');
            $table->renameColumn('created_at_date', 'created_year');
        });
    }
}
