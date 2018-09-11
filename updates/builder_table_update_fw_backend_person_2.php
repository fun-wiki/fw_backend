<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->boolean('is_pseudo');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->dropColumn('is_pseudo');
        });
    }
}
