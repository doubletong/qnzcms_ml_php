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
   public function update_case($id, $title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$recommend) {

        $sql = "UPDATE cases SET title= :title,
           categoryid =:categoryid,
           thumbnail =:thumbnail,    
           body = :body,
           summary = :summary,
           importance = :importance,
           pubdate = :pubdate,
           recommend = :recommend
             WHERE id =:id";

        $date = new DateTime($pubdate);
        $publish = $date->getTimestamp();

        $query = db::getInstance()->prepare($sql);
       
        $query->bindValue(":title",$title);
        $query->bindValue(":categoryid",$categoryid,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":body",$body);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":pubdate",$publish,PDO::PARAM_INT);
        $query->bindValue(":recommend",$recommend,PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();
       
        $result = $query->rowCount();;
      
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_case($title,  $categoryid,$thumbnail,$body,$summary,$importance,$pubdate,$recommend) {

      
        $sql="INSERT INTO `cases`(`title`, `thumbnail`, `categoryid`,`body`,`summary`,`importance`, `pubdate`, `recommend`,`added_by`,`added_date`) 
        VALUES (:title,:thumbnail, :categoryid, :body, :summary, :importance,:pubdate,:recommend, :added_by,:added_date)";

        $username = $_SESSION['valid_user'];
        $date = new DateTime($pubdate);
        $publish = $date->getTimestamp();

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":categoryid",$categoryid,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":body",$body);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":pubdate",$publish,PDO::PARAM_INT);
        $query->bindValue(":recommend",$recommend,PDO::PARAM_BOOL);
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