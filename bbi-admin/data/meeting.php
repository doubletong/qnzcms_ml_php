<?php
class Meeting{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, categoryId, thumbnail, active, pubdate, added_by FROM meetings ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM meetings WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_meeting($id){
        $query = db::getInstance()->prepare("DELETE FROM `meetings` WHERE id = ?");
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
    public function meeting_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `meetings`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_meeting($id, $title, $content, $summary, $meeting_time, $address, $sponsor, $co_organizer, $description, $keywords, $active,  $thumbnail) {

        $sql = "UPDATE meetings SET title= :title,
           address =:address,
           thumbnail =:thumbnail,
           sponsor = :sponsor,
           co_organizer = :co_organizer,
             keywords = :keywords,
             description = :description,
             content = :content,
             summary = :summary,
             meeting_time = :meeting_time,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":address",$address);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":sponsor",$sponsor);
        $query->bindValue(":co_organizer",$co_organizer);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":meeting_time",date("Y-m-d H:i:s", strtotime($meeting_time)),PDO::PARAM_STR);
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


    public function insert_meeting($title, $content, $summary, $meeting_time, $address, $sponsor, $co_organizer, $description, $keywords, $active,  $thumbnail) {

        // $sql="INSERT INTO meetings (title,categoryId,thumbnail,image_url,keywords, description,content,summary,pubdate,active,added_by,added_date)
        //         VALUES (:title,:categoryId,:thumbnail,:imageUrl,:keywords, :description,:content, :summary,:pubdate,:active,:added_by,:added_date)";

        $sql="INSERT INTO `meetings`(`title`, `content`, `summary`, `meeting_time`, `address`, `sponsor`, `co_organizer`, `description`, `keywords`, `active`,  `thumbnail`, `added_by`,`added_date`) 
        VALUES (:title, :content, :summary, :meeting_time, :address, :sponsor, :co_organizer, :description, :keywords, :active,  :thumbnail, :added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":address",$address);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":sponsor",$sponsor);
        $query->bindValue(":co_organizer",$co_organizer);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":meeting_time",date("Y-m-d H:i:s", strtotime($meeting_time)),PDO::PARAM_STR);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
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