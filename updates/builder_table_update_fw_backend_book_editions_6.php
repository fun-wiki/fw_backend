<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBookEditions6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->integer('book_type_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_book_editions', function($table)
        {
            $table->integer('book_type_id')->nullable(false)->change();
        });
    }
}
