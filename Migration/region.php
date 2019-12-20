<?php 
require "../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('regions', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->integer('importance');
       $table->string('description', 250)->nullable();
       $table->timestamps();

   });