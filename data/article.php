<?php
namespace TZGCMS{
class Article{
   // static $pageSize = 10;
   // Article::$pageSize 
    public function get_paged_articles_v1($did,$cid,$keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT a.id, a.title, a.summary, a.thumbnail,  a.pubdate, c.title as category_title FROM articles as a 
        LEFT JOIN article_categories as c ON a.categoryId = c.id
        where a.dictionary_id = $did ";
        if(!empty($cid)){
            $sql =  $sql. "AND a.categoryId = $cid ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (a.title LIKE :keyword OR a.content LIKE  :keyword) ";
        }
        $sql =  $sql." ORDER BY a.pubdate DESC,a.id DESC LIMIT $startIndex, $pageSize ";
    
        $query = \db::getInstance()->prepare($sql);      
     
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_articles_count_v1($did,$cid,$keyword){
        $param = "%{$keyword}%";
    
        $sql = "SELECT count(*) as count FROM `articles` where dictionary_id = $did ";
    
        if(!empty($cid)){
            $sql =  $sql. "AND categoryId = $cid ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (title LIKE :keyword OR content LIKE  :keyword)";
        }
    
        $query = \db::getInstance()->prepare($sql);    
    
     //  $query->bindValue(":category_id", $cid, PDO::PARAM_INT);  
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }


    public function fetch_paged($pageIndex,$pageSize){
        $startIndex = ($pageIndex-1) * $pageSize;
        $query = \db::getInstance()->prepare("SELECT id, title, summary, thumbnail,  pubdate FROM articles  where active=1 ORDER BY pubdate DESC LIMIT $startIndex, $pageSize");       
        $query->execute();

        return $query->fetchAll();
    }

    //获取总数
    public function article_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `articles` where active=1");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function search_paged($keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";

        $startIndex = ($pageIndex-1) * $pageSize;
        $query = db::getInstance()->prepare("SELECT id, title, summary, thumbnail,  
        pubdate FROM articles  where active=1 AND title LIKE :keyword ORDER BY pubdate DESC LIMIT $startIndex, $pageSize");   
        $query->bindValue(":keyword", $param);  
       // $query->bindValue(":id",$id,PDO::PARAM_INT);  
        $query->execute();

        return $query->fetchAll();
    }

    //获取总数
    public function search_count($keyword){
        $param = "%{$keyword}%";
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `articles` where active=1 AND title LIKE :keyword ");    
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function get_articles_bycategory($cid){
        $query = \db::getInstance()->prepare("SELECT id,title,categoryId,summary,thumbnail  FROM articles WHERE active=1 AND categoryId = $cid ORDER BY pubdate DESC, id Desc");
        $query->execute();
        return $query->fetchAll();
    }

    public function get_all_articles($did){
        $query = \db::getInstance()->prepare("SELECT id,title,categoryId FROM articles WHERE active=1 AND dictionary_id = $did ORDER BY pubdate DESC, id Desc");
        $query->execute();

        return $query->fetchAll();
    }

    public function get_all_years($did){
        $query = db::getInstance()->prepare("SELECT  DISTINCT DATE_FORMAT(FROM_UNIXTIME(`pubdate`), '%Y') as year FROM articles WHERE active=1 AND dictionary_id = $did ORDER BY year DESC");
        $query->execute();

        return $query->fetchAll();
    }


    //按分类获取最近新闻
    public function laster_articles($cid){
        $query = \db::getInstance()->prepare("SELECT a.id, a.title, a.summary, a.thumbnail,  a.pubdate, c.title as category_title FROM articles as a 
        LEFT JOIN article_categories as c ON a.categoryId = c.id WHERE a.categoryId = $cid ORDER BY a.pubdate DESC limit 4");
        $query->execute();
        return $query->fetchAll();
    }
    //获取推荐新闻
    public function get_laster_recommend_articles($count){
        $query = \db::getInstance()->prepare("SELECT a.id, a.title, a.summary, a.thumbnail, a.pubdate, c.title as category_title FROM articles as a 
        LEFT JOIN article_categories as c ON a.categoryId = c.id WHERE a.recommend = 1 ORDER BY a.pubdate DESC limit $count");
        $query->execute();
        return $query->fetchAll();
    }

    //按分类获取推荐新闻
    public function get_recommend_articles_bycategory($cid,$count){
        $query = \db::getInstance()->prepare("SELECT a.id, a.title, a.summary, a.thumbnail,a.background_image, a.pubdate, c.title as category_title FROM articles as a 
        LEFT JOIN article_categories as c ON a.categoryId = c.id WHERE a.recommend = 1 AND  a.categoryId = $cid ORDER BY a.pubdate DESC limit $count");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT a.*, c.title as category_title FROM articles as a 
        LEFT JOIN article_categories as c ON a.categoryId = c.id WHERE a.id = :id;UPDATE articles SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
  //获取前一条记录
    public function fetch_prev_data($id,$did){
        $query = \db::getInstance()->prepare("SELECT * FROM articles WHERE dictionary_id = $did AND id = (SELECT MAX(id) FROM articles WHERE dictionary_id = $did AND id < :id);");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id,$did){
        $query = \db::getInstance()->prepare("SELECT * FROM articles WHERE dictionary_id = $did AND id = (SELECT MIN(id) FROM articles WHERE dictionary_id = $did AND id > :id);");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }


    public function get_categories($did){     
        $query = \db::getInstance()->prepare("SELECT * FROM  article_categories WHERE dictionary_id = ? ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }
    public function get_children_categories($did, $parent_id){     
        $query = db::getInstance()->prepare("SELECT * FROM  article_categories WHERE dictionary_id = ? AND parent_id = $parent_id ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }

    
    public function get_category_byid($id){
        $query = \db::getInstance()->prepare("SELECT * FROM article_categories WHERE id = :id;");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

    public function get_article_documents($aid){
        $query = db::getInstance()->prepare("SELECT * FROM article_documents WHERE article_id = ? ORDER BY importance DESC");   
        $query->bindValue(1,$aid);  
        $query->execute();
        return $query->fetchAll();
    }
}
}