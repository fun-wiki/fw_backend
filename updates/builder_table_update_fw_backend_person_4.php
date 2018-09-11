<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson4 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->text('bio')->nullable();
            $table->string('photo')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->dropColumn('bio');
            $table->string('photo', 191)->change();
        });
    }
}
