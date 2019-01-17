<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiterature3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->renameColumn('universes_id', 'universe_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->renameColumn('universe_id', 'universes_id');
        });
    }
}
