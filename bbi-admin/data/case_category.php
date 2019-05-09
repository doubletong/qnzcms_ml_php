<?php
class CaseCategory{
    public function fetch_all(){
     
        $query = db::getInstance()->prepare("SELECT * FROM  case_categories ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM case_categories WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_case($id){
        $query = db::getInstance()->prepare("DELETE FROM `case_categories` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

    
    //获取总数
    public function case_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `case_categories`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_case($id, $title, $title_en, $imageurl,$importance,$active) {

        $sql = "UPDATE `case_categories` SET title= :title,
           title_en =:title_en,
           imageurl =:imageurl,
           importance =:importance,     
           active =:active 
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":title_en",$title_en);
        $query->bindValue(":imageurl",$imageurl);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_case($title, $title_en, $imageurl,$importance,$active) {

      
        $sql="INSERT INTO `case_categories`(`title`, `title_en`, `imageurl`, `importance`, `active`,`added_date`) 
        VALUES (:title,:title_en, :imageurl,:importance, :active,:added_date)";

       // $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":title_en",$title_en);
        $query->bindValue(":imageurl",$imageurl);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":added_date",time(),PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}