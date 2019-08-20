<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendBookEditions extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_book_editions');
    }
    
    public function down()
    {
        Schema::create('fw_backend_book_editions', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 191);
            $table->string('slug', 191)->nullable()->default('NULL');
            $table->string('cover', 191)->nullable()->default('NULL');
            $table->string('isbn', 191)->nullable()->default('NULL');
            $table->string('release_date', 191)->nullable()->default('NULL');
            $table->text('annotations')->nullable()->default('NULL');
            $table->integer('book_type_id')->nullable()->default(NULL);
            $table->timestamp('created_at')->nullable()->default('NULL');
            $table->timestamp('updated_at')->nullable()->default('NULL');
            $table->text('authors')->nullable()->default('NULL');
        });
    }
}
