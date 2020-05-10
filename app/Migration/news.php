<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('news', function ($table) {

       $table->increments('id');
       $table->string('title', 150);       
       $table->string('summary', 500)->nullable();
       $table->string('thumbnail', 150);
       $table->longText('content')->nullable();     
       $table->integer('importance')->unsigned();     
       $table->integer('view_count')->unsigned();     

       $table->timestamp('pubdate')->useCurrent();
       $table->string('author', 50)->nullable();
       $table->integer('category_id')->unsigned();     
      
       $table->foreign('category_id')
            ->references('id')->on('news_categories')
            ->onDelete('cascade');
       $table->boolean('active')->default('1');
       $table->boolean('recommend')->default('0');
       $table->string('added_by', 100);      

       $table->timestamps();
   });