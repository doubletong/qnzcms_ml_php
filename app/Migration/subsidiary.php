<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('subsidiaries', function ($table) {

       $table->increments('id');
       $table->string('name', 100);
       $table->string('logo_url', 150);
       $table->string('stock_code', 6);
  
       $table->integer('importance')->unsigned();     
       $table->integer('category_id')->unsigned();     
       $table->foreign('category_id')
            ->references('id')->on('subsidiary_categories')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });