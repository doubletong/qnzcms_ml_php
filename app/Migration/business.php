<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('businesses', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('image_url', 150);
       $table->longText('content')->nullable();  
       $table->integer('importance')->unsigned();     
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('subsidiary_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });