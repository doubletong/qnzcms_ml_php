<?php
class Video{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM wp_videos ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_videos WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_video($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_videos` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

//更新产品
    public function update_video($id, $title,$sub_title,$productName,$thumbnail, $videoUrl,$ogv,$webm,$keywords, $description, $content,$importance,$active) {

        $sql = "update wp_videos
             set
             title= :title,
             sub_title = :sub_title,
             productName = :productName,
               keywords = :keywords,
             description = :description,
             content = :content,
             importance = :importance,
             thumbnail =:thumbnail,
             video_url= :videoUrl,
             ogv = :ogv,
             webm = :webm,
             active =:active
             where id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":sub_title",$sub_title);
        $query->bindValue(":productName",$productName);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":videoUrl",$videoUrl);
        $query->bindValue(":ogv",$ogv);
        $query->bindValue(":webm",$webm);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
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


    public function insert_video( $title,$sub_title,$productName,$thumbnail, $videoUrl,$ogv,$webm,$keywords, $description, $content,$importance,$active) {

        $sql="INSERT INTO wp_videos ( title,sub_title,productName,thumbnail,video_url,ogv,webm, keywords,description,content,importance,active,added_by,added_date)
                VALUES (:title,:sub_title,:productName,:thumbnail,:videoUrl,:ogv,:webm, :keywords,:description,:content,:importance,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":sub_title",$sub_title);
        $query->bindValue(":productName",$productName);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":videoUrl",$videoUrl);
        $query->bindValue(":ogv",$ogv);
        $query->bindValue(":webm",$webm);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",date('Y-m-d H:i:s'));
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}