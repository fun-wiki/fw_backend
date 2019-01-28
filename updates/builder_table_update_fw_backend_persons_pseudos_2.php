<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPersonsPseudos2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_persons_pseudos', function($table)
        {
            $table->dropColumn('id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_persons_pseudos', function($table)
        {
            $table->increments('id')->unsigned();
        });
    }
}
