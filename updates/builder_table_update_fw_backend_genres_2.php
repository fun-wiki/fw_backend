<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendGenres2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_genres', function($table)
        {
            $table->string('slug');
            $table->text('description')->nullable()->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_genres', function($table)
        {
            $table->dropColumn('slug');
            $table->string('description', 191)->nullable()->unsigned(false)->default(null)->change();
        });
    }
}
