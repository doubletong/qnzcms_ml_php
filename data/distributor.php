<?php
class Distributor{
    public function fetch_all(){
        $query =  db::getInstance()->prepare("SELECT * FROM wp_distributors WHERE active = 1 ORDER BY importance ASC");
        $query->execute();
        return $query->fetchAll();
    }

    // public function fetch_by_category($category_id){
    //     $query =  db::getInstance()->prepare("SELECT * FROM wp_distributors WHERE active = 1 AND category_id = ? ORDER BY importance DESC");
    //     $query->bindValue(1,$category_id);
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_distributors WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

}