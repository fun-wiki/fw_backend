<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookEditions3 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->integer('book_type_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->dropColumn('book_type_id');
        });
    }
}
