<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('users', function ($table) {

       $table->increments('id');
       $table->string('username', 100)->unique();      
       $table->string('email', 150)->nullable();
       $table->string('photo', 150)->nullable();
       $table->string('password', 150);
       $table->timestamp('last_login')->useCurrent();    
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });