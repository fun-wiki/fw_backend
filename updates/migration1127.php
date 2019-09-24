<?php namespace fw\Backend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class Migration1127 extends Migration
{
public function up()
    {
        Schema::rename('fw_backend_content', 'fw_backend_articles');
    
    }
    
    public function down()
    {
        Schema::rename('fw_backend_articles', 'fw_backend_content');
    
    }

}