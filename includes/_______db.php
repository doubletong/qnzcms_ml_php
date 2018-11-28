<?php
try{
    $dbh = new PDO('mysql:host=localhost;dbname=waterpikdb', 'root', '', array( PDO::ATTR_PERSISTENT => false));
}catch (PDOException $e){
    echo $e->getMessage();
}