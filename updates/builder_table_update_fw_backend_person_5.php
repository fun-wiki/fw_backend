<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPerson5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->boolean('is_author');
            $table->boolean('is_illustrator');
            $table->boolean('is_actor');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_person', function($table)
        {
            $table->dropColumn('is_author');
            $table->dropColumn('is_illustrator');
            $table->dropColumn('is_actor');
        });
    }
}
