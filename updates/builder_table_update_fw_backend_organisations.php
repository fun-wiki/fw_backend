<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendOrganisations extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_organisatons', 'fw_backend_organisations');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_organisations', 'fw_backend_organisatons');
    }
}
