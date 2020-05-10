<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('social_softwares', function ($table) {

       $table->increments('id');
       $table->string('name', 100)->unique();
       $table->string('icon', 150)->nullable();
       $table->string('iconfont', 50)->nullable();
       $table->integer('importance');
       $table->boolean('active');
       $table->string('added_by', 100);       
       
       $table->timestamps();


   });