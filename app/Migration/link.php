<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('links', function ($table) {

       $table->increments('id');
       $table->string('title', 100);       
       $table->string('lang', 50);
       $table->string('url', 150);
       $table->string('image_url', 150);
       $table->integer('importance')->unsigned();     
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('link_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });