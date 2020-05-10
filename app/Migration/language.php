<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('languages', function ($table) {
      
       $table->string('code', 50);
       $table->string('name',100);     
       $table->boolean('issys')->default(false);     
       $table->boolean('default')->default(false);
       $table->integer('importance')->unsigned();  
       $table->boolean('active');    
       
       $table->timestamps();
       $table->primary('code');

});
