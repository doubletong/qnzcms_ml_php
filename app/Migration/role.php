<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('roles', function ($table) {

       $table->increments('id');
       $table->string('name', 100)->unique();      
       $table->string('description', 250)->nullable(); 
       $table->string('added_by', 100);

       $table->timestamps();
   });