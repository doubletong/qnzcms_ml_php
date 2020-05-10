<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('questions', function ($table) {

       $table->increments('id');
       $table->string('title', 150);
       $table->string('answer', 500)->nullable();      
       $table->integer('importance')->unsigned();       
       $table->boolean('active');
       $table->string('added_by', 100);   
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('question_categories')
            ->onDelete('cascade');

       $table->timestamps();

});