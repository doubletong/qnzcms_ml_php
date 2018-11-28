<?php
class Carousel{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_carousels ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_carousels WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

}