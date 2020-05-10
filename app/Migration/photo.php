<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('photos', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('image_url', 150);     
       $table->string('description', 500)->nullable();
       $table->integer('importance')->unsigned(); 
       $table->integer('album_id')->unsigned();     
       $table->foreign('album_id')
            ->references('id')->on('albums')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });