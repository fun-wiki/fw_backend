<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks13 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('slug', 255)->nullable()->change();
            $table->integer('book_type_id')->nullable()->change();
            $table->string('title_original', 255)->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('slug', 255)->nullable(false)->change();
            $table->integer('book_type_id')->nullable(false)->change();
            $table->string('title_original', 255)->nullable(false)->change();
        });
    }
}
