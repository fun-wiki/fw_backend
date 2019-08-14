<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationWorksAuthors extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_relation_works_persons', 'fw_backend_relation_works_authors');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_works_authors', 'fw_backend_relation_works_persons');
    }
}
