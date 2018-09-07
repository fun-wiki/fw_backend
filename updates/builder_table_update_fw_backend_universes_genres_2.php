<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendUniversesGenres2 extends Migration
{
    public function up()
    {
        Schema::table('fw_backend_universes_genres', function($table)
        {
            $table->integer('universes_id');
            $table->integer('genres_id');
            $table->dropColumn('universe_id');
            $table->dropColumn('genre_id');
        });
    }
    
    public function down()
    {
        Schema::table('fw_backend_universes_genres', function($table)
        {
            $table->dropColumn('universes_id');
            $table->dropColumn('genres_id');
            $table->integer('universe_id');
            $table->integer('genre_id');
        });
    }
}
