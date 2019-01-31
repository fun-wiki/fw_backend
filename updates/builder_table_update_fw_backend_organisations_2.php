<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisations2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->string('slug', 191)->nullable()->change();
            $table->string('name', 191)->nullable()->change();
            $table->string('open_date', 191)->nullable()->change();
            $table->text('description')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_organisations', function($table)
        {
            $table->string('slug', 191)->nullable(false)->change();
            $table->string('name', 191)->nullable(false)->change();
            $table->string('open_date', 191)->nullable(false)->change();
            $table->text('description')->nullable(false)->change();
        });
    }
}
