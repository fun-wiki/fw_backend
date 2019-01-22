<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiterature6 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->dropColumn('universe_id');
            $table->dropColumn('book_series_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->integer('universe_id');
            $table->integer('book_series_id');
        });
    }
}
