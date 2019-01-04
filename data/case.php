<?php
class CaseShow{ 

    public function fetch_category($category){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE category = :category ORDER BY added_date DESC");
        $query->bindValue(":category",$category,PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }

}