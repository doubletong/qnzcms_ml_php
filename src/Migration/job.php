<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('jobs', function ($table) {

       $table->increments('id');
       $table->string('title', 150);
       $table->string('city', 100)->nullable();
       $table->string('department', 150)->nullable();
       $table->longText('responsibilities')->nullable();  
       $table->longText('requirement')->nullable();     
       $table->integer('population')->unsigned();
       $table->integer('importance')->unsigned();  
       $table->boolean('active');    
       $table->string('added_by', 100);   

       $table->timestamps();

});
