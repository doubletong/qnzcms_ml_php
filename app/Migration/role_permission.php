<?php 
require "../../config/database.php";
use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('role_permission', function ($table) {

    $table->integer('permission_id')->unsigned();
    $table->integer('role_id')->unsigned();
    $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
    $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
    
    $table->timestamps();
});

