<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('email_templates', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('code', 100)->unique();
       $table->longText('htmlbody');   
       $table->integer('importance');
       $table->string('added_by', 100);   
       $table->timestamps();

   });