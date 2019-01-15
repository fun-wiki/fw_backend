<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiterature extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->text('content')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->string('content', 191)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
