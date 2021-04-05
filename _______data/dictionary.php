<?php
namespace TZGCMS{
    class Dictionary{
        public function get_dictionaries_byid($typeId){    
            $query = \db::getInstance()->prepare("SELECT * FROM dictionaries WHERE type_id = $typeId ORDER BY id");
            $query->execute();
            return $query->fetchAll();
        }
    }
}