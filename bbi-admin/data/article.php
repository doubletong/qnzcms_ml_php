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
   public function update_article($id, $title,$categoryId,$dictionary_id,$thumbnail,$imageUrl,$background_image,$author,$source,$source_url,$keywords,$active, $description, $content,$summary,$pubdate) {

        $sql = "UPDATE wp_articles SET title= :title,
           categoryId =:categoryId,
           dictionary_id = :dictionary_id,
           thumbnail =:thumbnail,
             image_url = :imageUrl,
             background_image = :background_image,
             author=:author,
             source=:source,
             source_url=:source_url,
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
       $query->bindValue(":dictionary_id",$dictionary_id);
       $query->bindValue(":thumbnail",$thumbnail);
       $query->bindValue(":imageUrl",$imageUrl);
       $query->bindValue(":background_image",$background_image);
       $query->bindValue(":author",$author);
       $query->bindValue(":source",$source);
       $query->bindValue(":source_url",$source_url);
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


    public function insert_article($title,$categoryId,$dictionary_id,$thumbnail,$imageUrl,$background_image,$author,$source,$source_url,$keywords,$active, $description, $content,$summary,$pubdate) {

        $sql="INSERT INTO wp_articles (title,categoryId,dictionary_id,thumbnail,image_url,background_image,author,source,source_url,keywords, description,content,summary,pubdate,active,added_by,added_date)
                VALUES (:title,:categoryId,:dictionary_id,:thumbnail,:imageUrl,:background_image,:author,:source,:source_url,:keywords, :description,:content, :summary,:pubdate,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $date = new DateTime($pubdate);
        $publish = $date->getTimestamp();

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":categoryId",$categoryId);
        $query->bindValue(":dictionary_id",$dictionary_id);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":imageUrl",$imageUrl);
        $query->bindValue(":background_image",$background_image);
        $query->bindValue(":author",$author);
        $query->bindValue(":source",$source);
        $query->bindValue(":source_url",$source_url);
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

    public function get_section_title($did){
      
        switch ($did) {
            case "16":
            return array(
                "category" => "主题",
                "article" => "文章",
                "section" => "媒体报告",
            );
              break;
            case "banana":
              echo "Your favorite fruit is banana!";
              break;
            case "orange":
              echo "Your favorite fruit is orange!";
              break;
            default:
              return array(
                "category" => "分类",
                "article" => "文章",
                "section" => "文章系统",
            );
         }
    }

}