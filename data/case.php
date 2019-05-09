<?php
class CaseShow{ 

    public function get_case_categories(){
        $query = db::getInstance()->prepare("SELECT * FROM case_categories ORDER BY importance DESC");      
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_category($category){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE category = :category ORDER BY added_date DESC");
        $query->bindValue(":category",$category,PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }

    public function get_recommend_cases(){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE recommend = 1 ORDER BY importance DESC limit 0,12");      
        $query->execute();

        return $query->fetchAll();
    }

    public function get_case_by($id){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE id = :id;UPDATE cases SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
  //获取前一条记录
    public function fetch_prev_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE id = (SELECT MAX(id) FROM cases WHERE id < :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE id = (SELECT MIN(id) FROM cases WHERE id > :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

}