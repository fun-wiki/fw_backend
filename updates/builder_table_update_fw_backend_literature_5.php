<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendLiterature5 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->renameColumn('bookseries_id', 'book_series_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_literature', function($table)
        {
            $table->renameColumn('book_series_id', 'bookseries_id');
        });
    }
}
