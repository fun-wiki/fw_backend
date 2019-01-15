<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesPersons3 extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_persons_relations', 'fw_backend_universes_persons');
        Schema::table('fw_backend_universes_persons', function($table)
        {
            $table->dropColumn('literature_id');
        });
    }
    
    public function down()
    {
        Schema::rename('fw_backend_universes_persons', 'fw_backend_persons_relations');
        Schema::table('fw_backend_persons_relations', function($table)
        {
            $table->integer('literature_id')->nullable();
        });
    }
}
