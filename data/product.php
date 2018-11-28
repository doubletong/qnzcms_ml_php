<?php
class Product{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE active=1 ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function hot_products(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE active=1  ORDER BY view_count DESC limit 5");
        $query->execute();
        return $query->fetchAll();
    }

    public function recommendProducts(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE active=1 AND recommend = 1 ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

}