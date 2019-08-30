<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendRelationUniversesUniverses extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_relation_universes_universes', function($table)
        {
            $table->integer('metasetting_id')->nullable()->default(0);
            $table->integer('universe_id')->default(0)->change();
            $table->dropColumn('metasseting_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_relation_universes_universes', function($table)
        {
            $table->dropColumn('metasetting_id');
            $table->integer('universe_id')->default(NULL)->change();
            $table->integer('metasseting_id')->nullable()->default(NULL);
        });
    }
}
