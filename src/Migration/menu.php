<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('menus', function ($table) {

       $table->increments('id');
       $table->string('title', 150);
       $table->string('url', 150)->nullable();
       $table->string('description', 250)->nullable();
       $table->string('icon', 100)->nullable();
       $table->integer('parent')->unsigned();  
       $table->integer('group_id')->unsigned();  
       $table->integer('importance')->unsigned();  
       $table->boolean('active');
       $table->string('added_by', 100);   

       $table->timestamps();

});