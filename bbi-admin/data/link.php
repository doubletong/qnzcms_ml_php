<?php
class Link{
    public function fetch_all(){    
        $query = db::getInstance()->prepare("SELECT * FROM wp_links ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_links WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_link($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_links` WHERE id = ?");
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
        public function link_count(){
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `wp_links`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

//更新产品
    public function update_link($id,$title,$importance,$imageUrl,$active, $link) {

        $sql = "update wp_links
             set
             title= :title,
             importance = :importance,
             image_url =:imageUrl,
             link = :link,
             active =:active
             where id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":link",$link);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":imageUrl",$imageUrl);
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


    public function insert_link($title,$importance,$imageUrl,$active,  $link) {

        $sql="INSERT INTO wp_links ( title,importance, image_url,link,active,added_by,added_date)
                VALUES (:title,:importance, :imageUrl, :link,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":link",$link);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":imageUrl",$imageUrl);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
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