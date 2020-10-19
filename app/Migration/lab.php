<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('labs', function ($table) {

       $table->increments('id');     
       $table->string('title', 150);
       $table->string('thumbnail', 150);    
       $table->longText('content')->nullable();         
       $table->string('summary', 500);
       $table->string('structure', 500);
       $table->string('committee', 500);
       $table->integer('view_count')->default(0)->unsigned();  
       $table->boolean('active')->default(1); 
       $table->string('added_by', 100);   
       
       $table->timestamps();

});