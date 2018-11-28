<?php
try{
    /*** connect to SQLite database ***/
    $dbh = new PDO("sqlite:../app_data/waterpik.sqlite");
}catch (PDOException $e){
    echo $e->getMessage();
}