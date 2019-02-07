<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookEditions7 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->text('authors')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->dropColumn('authors');
        });
    }
}
