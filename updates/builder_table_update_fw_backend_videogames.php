<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateFwBackendVideogames extends Migration
{
    public function up()
    {
        Schema::rename('fw_backend_videogame', 'fw_backend_videogames');
    }
    
    public function down()
    {
        Schema::rename('fw_backend_videogames', 'fw_backend_videogame');
    }
}