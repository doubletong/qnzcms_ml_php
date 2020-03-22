<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('options', function ($table) {

      
       $table->string('config_name', 50);
       $table->json('config_values')->nullable();     
       $table->string('added_by', 100);   

       $table->timestamps();
       $table->primary('config_name');

});
