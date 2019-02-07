<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookEditions5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->dropColumn('first_edition');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->boolean('first_edition')->nullable();
        });
    }
}
