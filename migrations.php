<?php 
require "config/database.php";
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Query\Expression;
use Illuminate\Database\Migrations\Migration;
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

// Capsule::schema()->create('offers', function ($table) {
//    $table->increments('id');
//    $table->string('name',50);
//    $table->string('schools',250)->nullable();
//    $table->string('scholarship',100)->nullable();
//    $table->string('image_url',150)->nullable();
//    $table->integer('dictionary_id');   
//    $table->integer('importance')->default(0);
//    $table->boolean('active')->default('1');
//    $table->boolean('recommend')->default('0');   
//    $table->string('created_by');
//   // $table->timestamps();
//    $table->timestamp('created_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
//    $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
// });

// Capsule::schema()->create('links', function ($table) {
//    $table->increments('id');
//    $table->string('title',100);
//    $table->string('description',250)->nullable();
//    $table->string('url',150)->nullable();
//    $table->string('image_url',150)->nullable();
//    $table->integer('dictionary_id')->nullable();
//    $table->integer('importance')->default(0);
//    $table->boolean('active')->default('1');
//    $table->boolean('recommend')->default('0');   
//    $table->string('created_by');
//    $table->timestamp('created_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
//    $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
// });

// Capsule::schema()->create('i18n', function (Blueprint $table) {
//    $table->increments('id');
//    $table->string('keyword',100);
//    // $table->json('translation')->default(new Expression('(JSON_ARRAY())'));
//    $table->string('created_by',50);
//    $table->timestamp('created_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
//    $table->timestamp('updated_at')->default(Capsule::raw('CURRENT_TIMESTAMP'));
// });