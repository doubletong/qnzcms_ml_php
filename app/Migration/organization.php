<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('organizations', function ($table) {

       $table->increments('id');
       $table->string('title', 150);    
       $table->string('title_en', 150)->nullable();
       $table->integer('importance');
       $table->boolean('active');
       $table->string('added_by', 100);       
       
       $table->timestamps();


   });