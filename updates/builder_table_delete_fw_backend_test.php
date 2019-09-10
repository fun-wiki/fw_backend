<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteFwBackendTest extends Migration
{
    public function up()
    {
        Schema::dropIfExists('fw_backend_test');
    }
    
    public function down()
    {
        Schema::create('fw_backend_test', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('test_text', 191);
        });
    }
}
