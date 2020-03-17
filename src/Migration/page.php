<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('pages', function ($table) {

       $table->increments('id');
       $table->string('title', 150);
       $table->string('alias', 100)->unique();
       $table->string('background_image', 150)->nullable();
       $table->integer('view_count')->default(0)->unsigned();  
       $table->longText('content')->nullable();  
    //    $table->string('seo_title', 150);
    //    $table->string('seo_keywords', 250);
    //    $table->string('seo_description', 500);
       $table->integer('importance')->unsigned();  
       $table->boolean('active');    
       $table->string('added_by', 100);   

       $table->timestamps();

});