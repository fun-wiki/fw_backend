<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendBooks27 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title', 255)->default('null')->change();
            $table->string('title_ru', 255)->default('null')->change();
            $table->string('work_type', 191)->nullable()->change();
            $table->string('create_date', 191)->default('null')->change();
            $table->text('description')->default('null')->change();
            $table->integer('universe_id')->default(0)->change();
            $table->integer('series_id')->default(0)->change();
            $table->string('book_type', 191)->default('null')->change();
            $table->integer('number_in_series')->default(0)->change();
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_books', function($table)
        {
            $table->string('title', 255)->default('NULL')->change();
            $table->string('title_ru', 255)->default('NULL')->change();
            $table->string('work_type', 191)->nullable(false)->change();
            $table->string('create_date', 191)->default('NULL')->change();
            $table->text('description')->default('NULL')->change();
            $table->integer('universe_id')->default(NULL)->change();
            $table->integer('series_id')->default(NULL)->change();
            $table->string('book_type', 191)->default('NULL')->change();
            $table->integer('number_in_series')->default(NULL)->change();
        });
    }
}
