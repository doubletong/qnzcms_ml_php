<?php
namespace TZGCMS\Admin{
    class Article{

        public function get_paged_articles_v1($did,$cid,$keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.id, a.title, a.summary, a.thumbnail, a.view_count, a.recommend, a.dictionary_id,  a.pubdate, c.title as category_title FROM articles as a 
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


        
        public function fetch_all(){
         
            $query = \db::getInstance()->prepare("SELECT id, title, categoryId, thumbnail, active, pubdate, added_by FROM articles ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM articles WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_article($id){
            $query = \db::getInstance()->prepare("DELETE FROM `articles` WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            $result = $query->rowCount();;
            //1-success 2-error 3-info 4-warrning
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'记录已成功删除。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未删除记录。');
                return json_encode($msg);  
            }
        }

        
        //获取总数
        public function article_count(){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `articles`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

    //更新
    public function update_article($id, $title,$categoryId,$dictionary_id,$thumbnail,$imageUrl,$background_image,$author,$source,$source_url,
    $keywords,$active, $recommend,$description, $content,$summary,$pubdate) {

            $sql = "UPDATE articles SET title= :title,
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
                active =:active,
                recommend = :recommend
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);
            $date = new \DateTime($pubdate);
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
            $query->bindValue(":pubdate",$publish,\PDO::PARAM_INT);
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
            $query->bindValue(":recommend",$recommend,\PDO::PARAM_BOOL);
            $query->bindValue(":id",$id,\PDO::PARAM_INT);
            $query->execute();

            $result = $query->rowCount();;
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'记录已成功更新。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未更新记录。');
                return json_encode($msg);  
              
            }
        }


        public function insert_article($title,$categoryId,$dictionary_id,$thumbnail,$imageUrl,$background_image,
        $author,$source,$source_url,$keywords,$active, $recommend, $description, $content,$summary,$pubdate) {

            $sql="INSERT INTO articles (title,categoryId,dictionary_id,thumbnail,image_url,background_image,author,source,source_url,keywords, description,content,summary,pubdate,active,recommend,added_by,added_date)
                    VALUES (:title,:categoryId,:dictionary_id,:thumbnail,:imageUrl,:background_image,:author,:source,:source_url,:keywords, :description,:content, :summary,:pubdate,:active,:recommend,:added_by,:added_date)";

            $username = $_SESSION['valid_user'] ;

            $date = new \DateTime($pubdate);
            $publish = $date->getTimestamp();

            $query = \db::getInstance()->prepare($sql);
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
            $query->bindValue(":pubdate",$publish,\PDO::PARAM_INT);
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
            $query->bindValue(":recommend",$recommend,\PDO::PARAM_BOOL);
            $query->bindValue(":added_by",$username);
            $query->bindValue(":added_date",time(),\PDO::PARAM_INT);
            $query->execute();

            $result = $query->rowCount();;
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'新记录已成功创建。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未创建新记录。');
                return json_encode($msg);  
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
}