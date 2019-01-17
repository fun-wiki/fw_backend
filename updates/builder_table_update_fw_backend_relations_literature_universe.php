<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationsLiteratureUniverse extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_relations_literature_universe', function($table)
        {
            $table->renameColumn('universes_id', 'universe_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_relations_literature_universe', function($table)
        {
            $table->renameColumn('universe_id', 'universes_id');
        });
    }
}
