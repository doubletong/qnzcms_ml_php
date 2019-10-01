<?php 

require "config/database.php";
use Models\Offer;


Offer::create(
 [
  'name' => 'Mark Mike',
  'schools' => 'temp01-email-1@mark.com',
  'scholarship' => '1234',
  'image_url' => '1234',
  'importance' => '1234',
  'created_by' => '1234'
 ]
);
// Post::create(
//     [
//      'title' => 'New Blog Post12',
//      'body' => 'New Blog Content21',
//      'created_by' => 11
//     ]
//    );
// print_r(Offer::all());
print_r(Offer::all());
// print_r(User::find(1)->posts);

