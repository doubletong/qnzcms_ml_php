<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('videos', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('file_url', 150);
       $table->integer('file_size')->unsigned();
       $table->string('poster', 150);
       $table->string('description', 250)->nullable();
       $table->integer('importance')->unsigned();     
       
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('video_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });