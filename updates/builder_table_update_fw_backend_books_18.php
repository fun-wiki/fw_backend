<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks18 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->text('description')->nullable();
            $table->string('title', 191)->nullable()->change();
            $table->string('title_ru', 191)->nullable()->change();
            $table->dropColumn('annotation');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('description');
            $table->string('title', 191)->nullable(false)->change();
            $table->string('title_ru', 191)->nullable(false)->change();
            $table->text('annotation');
        });
    }
}
