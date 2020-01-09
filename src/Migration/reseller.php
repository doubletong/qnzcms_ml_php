<?php 
require "../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('resellers', function ($table) {

       $table->increments('id');
       $table->string('name', 100);
       $table->string('address', 150)->nullable();
       $table->string('email', 150)->nullable();
       $table->string('homepage', 150)->nullable();
       $table->string('phone', 150)->nullable();
       $table->string('fax', 150)->nullable();
       $table->string('opentime', 150)->nullable();
       $table->string('facebook', 150)->nullable();
       $table->string('instagram', 150)->nullable();
       $table->string('youtube', 150)->nullable();
       $table->string('twitter', 150)->nullable();
       $table->string('link', 150)->nullable();
       $table->string('zipcode', 150)->nullable();
       $table->integer('importance');
       $table->integer('region_id')->unsigned();     
       $table->foreign('region_id')
            ->references('id')->on('regions')
            ->onDelete('cascade');
       $table->integer('country_id')->unsigned();     
       $table->foreign('country_id')
            ->references('id')->on('countries')
            ->onDelete('cascade');
       $table->timestamps();

   });
