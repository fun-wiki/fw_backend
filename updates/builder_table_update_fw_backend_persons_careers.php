<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendPersonsCareers extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_persons_careers', function($table)
        {
            $table->renameColumn('careers_id', 'career_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_persons_careers', function($table)
        {
            $table->renameColumn('career_id', 'careers_id');
        });
    }
}
