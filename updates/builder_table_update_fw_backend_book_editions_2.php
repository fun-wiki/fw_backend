<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookEditions2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->string('title')->change();
            $table->string('slug')->change();
            $table->string('cover')->change();
            $table->string('isbn')->change();
            $table->string('release_date')->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->string('title', 191)->change();
            $table->string('slug', 191)->change();
            $table->string('cover', 191)->change();
            $table->string('isbn', 191)->change();
            $table->string('release_date', 191)->change();
        });
    }
}
