<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('role_user', function ($table) {

    $table->integer('user_id')->unsigned();
    $table->integer('role_id')->unsigned();
    $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

    $table->timestamps();
});

