<?php
class Media{
    public function fetch_all(){    
        $query = db::getInstance()->prepare("SELECT * FROM media_links ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM media_links WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_media($id){
        $query = db::getInstance()->prepare("DELETE FROM `media_links` WHERE id = ?");
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
        public function media_count(){
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `media_links`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

//更新产品
    public function update_media($id,$title,$category,$summary,$topicsId, $link) {

        $sql = "update media_links
             set
             title= :title,
             category = :category,
             summary =:summary,
             link = :link,
             topicsId =:topicsId
             where id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":link",$link);
        $query->bindValue(":topicsId",$topicsId,PDO::PARAM_INT);
        $query->bindValue(":category",$category);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_media($title,$category,$summary,$topicsId, $link) {

        $sql="INSERT INTO media_links (title, category, summary, topicsId, link, added_by, added_date)
                VALUES (:title,:category, :summary, :topicsId, :link, :added_by, :added_date)";


        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);      
        $query->bindValue(":category",$category);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":topicsId",$topicsId,PDO::PARAM_INT);
        $query->bindValue(":link",$link);

        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time());
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}