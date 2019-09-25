<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendArticles extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_articles', function($table)
        {
            $table->string('content_type', 191)->nullable()->default('null');
            $table->renameColumn('contentable_id', 'content_id');
            $table->dropColumn('contentable_type');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_articles', function($table)
        {
            $table->dropColumn('content_type');
            $table->renameColumn('content_id', 'contentable_id');
            $table->string('contentable_type', 191)->nullable()->default('NULL');
        });
    }
}
