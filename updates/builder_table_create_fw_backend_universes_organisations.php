<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateFwBackendUniversesOrganisations extends Migration
{
    public function up()
    {
        Schema::create('fw_backend_universes_organisations', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('univeses_id');
            $table->integer('organisations_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('fw_backend_universes_organisations');
    }
}
