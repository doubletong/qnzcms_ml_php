<?php 
require "start.php";
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('test001', function ($table) {
   $table->increments('id');
   $table->string('name');
   $table->string('email')->unique();
   $table->string('password');
   $table->timestamps();
});
Capsule::schema()->create('test002', function ($table) {
   $table->increments('id');
   $table->string('title');
   $table->text('body');
   $table->integer('created_by')->unsigned();
   $table->timestamps();
});

