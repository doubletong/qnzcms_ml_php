<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('papers', function ($table) {

       $table->increments('id');  
       $table->string('thumbnail', 150);
       $table->string('lang', 50);
       $table->longText('content')->nullable();     
       $table->timestamp('pubdate')->useCurrent();
       $table->integer('importance')->unsigned(); 
       $table->boolean('active')->default('1');
       $table->string('added_by', 100);      

       $table->timestamps();
   });