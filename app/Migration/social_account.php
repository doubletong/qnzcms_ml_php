<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('social_accounts', function ($table) {

       $table->increments('id');
       $table->string('username', 100);
       $table->string('url', 150)->nullable();
       $table->string('qrcode', 150)->nullable();
       $table->integer('importance')->unsigned();            
       $table->integer('social_id')->unsigned();     
       $table->foreign('social_id')
            ->references('id')->on('social_softwares')
            ->onDelete('cascade');
       $table->boolean('active');
       $table->string('added_by', 100);      

       $table->timestamps();
   });