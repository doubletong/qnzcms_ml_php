<?php
class Media{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM media_links ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

}