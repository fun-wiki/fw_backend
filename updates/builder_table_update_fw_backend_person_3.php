<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->string('photo')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->dropColumn('photo');
        });
    }
}
