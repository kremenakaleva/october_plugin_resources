<?php namespace Pensoft\Resources\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreatePensoftResourcesFormats extends Migration
{
    public function up()
    {
        Schema::create('pensoft_resources_formats', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->string('title');
            $table->integer('sort_order')->default(1);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('pensoft_resources_formats');
    }
}
