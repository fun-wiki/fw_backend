<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendRelationPersonsCompany extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_relation_persons_company', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('person_id');
            $table->integer('company_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_relation_persons_company');
    }
}
