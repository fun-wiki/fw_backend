<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiteratureType extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature_type', function($table)
        {
            $table->increments('id')->unsigned(false)->change();
            $table->string('title')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature_type', function($table)
        {
            $table->increments('id')->unsigned()->change();
            $table->string('title', 191)->change();
        });
    }
}
