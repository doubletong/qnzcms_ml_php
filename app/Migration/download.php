<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('downloads', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('file_url', 150);
       $table->integer('file_size')->unsigned();
       $table->string('thumbnail', 150);
       $table->longText('content')->nullable();
       $table->string('description', 250)->nullable();
       $table->integer('importance')->unsigned();     
       $table->integer('down_count')->unsigned();
       
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('download_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });