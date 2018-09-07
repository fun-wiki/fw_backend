<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->string('slug');
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
            $table->string('name')->change();
            $table->string('name_translate')->change();
            $table->string('country')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->dropColumn('slug');
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
            $table->string('name', 191)->change();
            $table->string('name_translate', 191)->change();
            $table->string('country', 191)->change();
        });
    }
}
