<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationPersonsCompany2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_relation_persons_company', function($table)
        {
            $table->string('date', 191)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_relation_persons_company', function($table)
        {
            $table->string('date', 191)->nullable(false)->change();
        });
    }
}
