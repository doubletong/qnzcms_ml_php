<?php
class CaseShow{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, categoryId, thumbnail, active, pubdate, added_by FROM cases ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM cases WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_case($id){
        $query = db::getInstance()->prepare("DELETE FROM `cases` WHERE id = ?");
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
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `cases`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_case($id, $title, $category, $thumbnail) {

        $sql = "UPDATE cases SET title= :title,
           category =:category,
           thumbnail =:thumbnail          
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":category",$category);
        $query->bindValue(":thumbnail",$thumbnail);
       
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_case($title,  $category,$thumbnail) {

      
        $sql="INSERT INTO `cases`(`title`, `thumbnail`, `category`, `added_by`,`added_date`) 
        VALUES (:title,:thumbnail, :category, :added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":category",$category);
        $query->bindValue(":thumbnail",$thumbnail);

        $query->bindValue(":added_by",$username);
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