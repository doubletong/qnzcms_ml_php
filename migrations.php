<?php 
require "start.php";
use Illuminate\Database\Capsule\Manager as Capsule;
// Capsule::schema()->create('test001', function ($table) {
//    $table->increments('id');
//    $table->string('name');
//    $table->string('email')->unique();
//    $table->string('password');
//    $table->timestamps();
// });
// Capsule::schema()->create('test002', function ($table) {
//    $table->increments('id');
//    $table->string('title');
//    $table->text('body');
//    $table->integer('created_by')->unsigned();
//    $table->timestamps();
// });

Capsule::schema()->create('offers', function ($table) {
   $table->increments('id');
   $table->string('name',50);
   $table->string('schools',250)->nullable();
   $table->string('scholarship',100)->nullable();
   $table->string('image_url',150)->nullable();
   $table->integer('dictionary_id');   
   $table->integer('importance')->default(0);
   $table->boolean('active')->default('1');
   $table->boolean('recommend')->default('0');   
   $table->string('created_by');
  // $table->timestamps();
   $table->timestamp('created_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
   $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
});

