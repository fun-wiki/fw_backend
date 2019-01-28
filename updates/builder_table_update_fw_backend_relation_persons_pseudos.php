<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationPersonsPseudos extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_persons_pseudos', 'fw_backend_relation_persons_pseudos');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_relation_persons_pseudos', 'fw_backend_persons_pseudos');
    }
}
