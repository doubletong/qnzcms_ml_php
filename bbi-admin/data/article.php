<?php
class Article{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, categoryId, thumbnail, active, pubdate, added_by FROM wp_articles ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_article($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_articles` WHERE id = ?");
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
    public function article_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `wp_articles`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_article($id, $title,$categoryId,$thumbnail,$imageUrl,$keywords,$active, $description, $content,$summary,$pubdate) {

        $sql = "UPDATE wp_articles SET title= :title,
           categoryId =:categoryId,
           thumbnail =:thumbnail,
             image_url = :imageUrl,
             keywords = :keywords,
             description = :description,
             content = :content,
             summary = :summary,
             pubdate = :pubdate,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
        $date = new DateTime($pubdate);
        $publish = $date->getTimestamp();

        $query->bindValue(":title",$title);
       $query->bindValue(":categoryId",$categoryId);
       $query->bindValue(":thumbnail",$thumbnail);
       $query->bindValue(":imageUrl",$imageUrl);
       $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":pubdate",$publish,PDO::PARAM_INT);
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


    public function insert_article($title,$categoryId,$thumbnail,$imageUrl,$keywords,$active, $description, $content,$summary,$pubdate) {

        $sql="INSERT INTO wp_articles (title,categoryId,thumbnail,image_url,keywords, description,content,summary,pubdate,active,added_by,added_date)
                VALUES (:title,:categoryId,:thumbnail,:imageUrl,:keywords, :description,:content, :summary,:pubdate,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $date = new DateTime($pubdate);
        $publish = $date->getTimestamp();

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":categoryId",$categoryId);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":imageUrl",$imageUrl);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":pubdate",$publish,PDO::PARAM_INT);
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