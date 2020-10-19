<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('researches', function ($table) {

       $table->increments('id');     
       $table->string('title', 150);
       $table->string('title_short', 50);
       $table->string('lang', 50);
       $table->string('icon', 150)->nullable();          
       $table->string('thumbnail', 150)->nullable();         
       $table->string('image_url', 150)->nullable();         
       $table->longText('content')->nullable();         
       $table->string('summary', 500);
       $table->string('research_group', 500);
       $table->string('teachers', 500);
       $table->integer('importance')->default(0)->unsigned();  
       $table->integer('view_count')->default(0)->unsigned();  
       $table->boolean('active')->default(1); 
       $table->string('added_by', 100);   
       
       $table->timestamps();

});