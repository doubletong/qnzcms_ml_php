<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('metadatas', function ($table) {

       $table->increments('id');     
       $table->string('title', 150);
       $table->string('keywords', 250);
       $table->string('description', 500);
       $table->integer('module_type')->unsigned();  
       $table->string('key_value', 150);
       $table->timestamps();

});