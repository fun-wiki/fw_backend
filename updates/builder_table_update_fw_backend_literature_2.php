<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiterature2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->integer('universes_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->dropColumn('universes_id');
        });
    }
}
