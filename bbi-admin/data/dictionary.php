<?php
class Dictionary{
    public function get_dictionaries_byid($typeId){
     //   global $dbh;
     //   $query = $dbh->prepare("SELECT * FROM dictionaries WHERE type_id = $typeId ORDER BY id");
        $query = db::getInstance()->prepare("SELECT * FROM dictionaries WHERE type_id = $typeId ORDER BY id");
        $query->execute();

        return $query->fetchAll();
    }


}