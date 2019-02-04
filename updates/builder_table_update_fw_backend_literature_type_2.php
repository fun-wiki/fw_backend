<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiteratureType2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature_type', function($table)
        {
            $table->string('slug')->nullable();
            $table->string('title')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature_type', function($table)
        {
            $table->dropColumn('slug');
            $table->string('title', 191)->change();
        });
    }
}
