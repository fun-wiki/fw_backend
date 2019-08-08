<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks14 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->dropColumn('book_type_id');
            $table->dropColumn('title_original');
            $table->dropColumn('title_ru');
            $table->dropColumn('universe_id');
            $table->dropColumn('book_series_id');
            $table->dropColumn('number_in_series');
            $table->dropColumn('annotations');
            $table->dropColumn('cover');
            $table->dropColumn('editions');
            $table->dropColumn('literature_type_id');
            $table->dropColumn('release_data');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title', 191);
            $table->string('slug', 255)->nullable();
            $table->integer('book_type_id')->nullable();
            $table->string('title_original', 255)->nullable();
            $table->string('title_ru', 191)->nullable();
            $table->integer('universe_id')->nullable();
            $table->integer('book_series_id')->nullable();
            $table->integer('number_in_series')->nullable();
            $table->text('annotations')->nullable();
            $table->string('cover', 191)->nullable();
            $table->text('editions')->nullable();
            $table->integer('literature_type_id')->nullable();
            $table->string('release_data', 191)->nullable();
        });
    }
}
