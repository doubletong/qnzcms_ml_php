<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('ann_categories', function ($table) {

       $table->increments('id');
       $table->string('title', 100);    
       $table->string('description', 250)->nullable();
       $table->integer('importance');
       $table->boolean('active');
       $table->string('added_by', 100); 
       $table->integer('parent')->unsigned()->nullable();    
       $table->foreign('parent')
            ->references('id')->on('ann_categories')
            ->onDelete('cascade');      
       
       $table->timestamps();


   });