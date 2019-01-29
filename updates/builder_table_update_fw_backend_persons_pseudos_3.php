<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPersonsPseudos3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_persons_pseudos', function($table)
        {
            $table->integer('person_id');
            $table->integer('pseudo_id');
            $table->dropColumn('my_person_id');
            $table->dropColumn('my_pseudo_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_persons_pseudos', function($table)
        {
            $table->dropColumn('person_id');
            $table->dropColumn('pseudo_id');
            $table->integer('my_person_id');
            $table->integer('my_pseudo_id');
        });
    }
}
