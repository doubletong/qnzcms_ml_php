<?php
class Team{ 

    public function fetch_category($category){
        $query = db::getInstance()->prepare("SELECT * FROM teams WHERE category = :category ORDER BY importance DESC");
        $query->bindValue(":category",$category,PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }

}