<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('exhibitions', function ($table) {

       $table->increments('id');     
       $table->string('title', 150);
       $table->string('thumbnail', 150);
       $table->timestamp('start_date')->default(Capsule::raw('CURRENT_TIMESTAMP'));
       $table->timestamp('end_date')->default(Capsule::raw('CURRENT_TIMESTAMP'));
       $table->longText('content')->nullable();  
       $table->string('summary', 500);
       $table->integer('view_count')->default(0)->unsigned();  
       $table->boolean('active')->default(1);    
       $table->boolean('recommend')->default(0);       
       $table->string('added_by', 100);   
       
       $table->timestamps();

});