<?php
class Article{
    public function fetch_paged($pageIndex,$pageSize){
        $startIndex = ($pageIndex-1) * $pageSize;
        $query = db::getInstance()->prepare("SELECT id, title, summary, thumbnail,  pubdate FROM wp_articles  where active=1 ORDER BY pubdate DESC LIMIT $startIndex, $pageSize");       
        $query->execute();

        return $query->fetchAll();
    }

    //获取总数
    public function article_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `wp_articles` where active=1");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    // public function fetch_all(){
    //     $query = db::getInstance()->prepare("SELECT * FROM wp_articles ORDER BY added_date DESC");
    //     $query->execute();

    //     return $query->fetchAll();
    // }

    // public function fetch_category($categoryId){
    //     $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE categoryId = :categoryId ORDER BY added_date DESC");
    //     $query->bindValue(":categoryId",$categoryId,PDO::PARAM_INT);
    //     $query->execute();

    //     return $query->fetchAll();
    // }

    public function laster_articles(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles ORDER BY added_date DESC limit 3");
        $query->execute();
        return $query->fetchAll();
    }

    // public function hotKnowledge(){
    //     $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE categoryId = 2 ORDER BY view_count DESC limit 10");
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE id = :id;UPDATE wp_articles SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
  //获取前一条记录
    public function fetch_prev_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE id = (SELECT MAX(id) FROM wp_articles WHERE id < :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_articles WHERE id = (SELECT MIN(id) FROM wp_articles WHERE id > :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
}