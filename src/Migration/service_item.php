<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('service_items', function ($table) {

       $table->increments('id');     
       $table->string('title', 150);
       $table->string('thumbnail', 150);
       $table->string('image_url', 150);
       $table->string('summary', 500);
       $table->longText('content')->nullable();  
       $table->integer('importance')->unsigned(); 
       $table->integer('view_count')->default(0)->unsigned();  
       $table->boolean('active')->default(1);    
       $table->boolean('recommend')->default(0);       
       $table->string('added_by', 100);   
       
       $table->timestamps();

});