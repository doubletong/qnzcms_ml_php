<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('resources', function ($table) {

       $table->increments('id');
       $table->string('lang_code', 50);   
       $table->string('key', 100);
       $table->string('value',500);           
       $table->string('added_by', 100);   

       $table->timestamps();
     //  $table->primary(['key','lang_code']);

});
