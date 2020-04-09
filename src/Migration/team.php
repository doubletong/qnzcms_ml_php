<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('teams', function ($table) {

       $table->increments('id');
       $table->string('name', 100);       
       $table->string('post', 100)->nullable();
       $table->string('photo', 150);
       $table->string('fullphoto', 150);
       $table->longText('content')->nullable();     
       $table->integer('importance')->unsigned();     
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('team_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });