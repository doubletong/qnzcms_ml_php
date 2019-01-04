<?php
class Topics{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM topics ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

}