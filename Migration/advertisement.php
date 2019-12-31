<?php 
require "../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('advertisements', function ($table) {

       $table->increments('id');
       $table->string('title', 100);
       $table->string('link', 150);
       $table->string('image_url', 150);
       $table->string('image_url_mobile', 150);
       $table->longText('content');       
       $table->string('description', 250)->nullable();
       $table->integer('importance');
       $table->integer('space_id')->unsigned();     
       $table->foreign('space_id')
            ->references('id')->on('advertising_spaces')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);       
       $table->nullableTimestamps();

   });