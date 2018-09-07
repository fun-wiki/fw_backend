<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPseudos extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_pseudos', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('name_translate');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_pseudos', function($table)
        {
            $table->string('name', 191);
            $table->string('name_translate', 191)->nullable();
        });
    }
}
