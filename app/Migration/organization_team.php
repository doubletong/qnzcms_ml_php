<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('teams_organizations', function ($table) {

       $table->integer('organizations_id')->unsigned()->index();
       $table->foreign('organizations_id')->references('id')->on('organizations')->onDelete('cascade');
       $table->integer('teams_id')->unsigned()->index();
       $table->foreign('teams_id')->references('id')->on('teams')->onDelete('cascade');

   });