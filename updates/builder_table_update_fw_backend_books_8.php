<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks8 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->integer('number_in_series')->nullable();
            $table->text('annotations')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('number_in_series');
            $table->dropColumn('annotations');
        });
    }
}
