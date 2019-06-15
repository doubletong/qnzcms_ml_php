<?php
class Product{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM products ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM products WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_product($id){
        $query = db::getInstance()->prepare("DELETE FROM `products` WHERE id = ?");
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
    public function product_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `products`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_product($id, $title,$importance,$thumbnail,$image_url,$keywords,$recommend,$active,$summary, $description, $content, $category_id) {

        $sql = "UPDATE products SET           
             title= :title,
             summary = :summary,         
             content = :content,          
             importance = :importance,
             thumbnail =:thumbnail,
             image_url = :image_url,
             keywords = :keywords,
             description = :description,
             recommend = :recommend,           
             category_id = :category_id,        
             active =:active
             WHERE id =:id";

        

        $query = db::getInstance()->prepare($sql);
   
        $query->bindValue(":title",$title);    
       $query->bindValue(":summary",$summary);      
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":description",$description);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":category_id",$category_id,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
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


    public function insert_product( $title, $importance,$thumbnail,
                                   $image_url,$keywords,$recommend,$active,$summary, $description, $content,$category_id) {

        $sql="INSERT INTO products (title, summary, description,content,importance,thumbnail,image_url,keywords,recommend,active,added_by,added_date,category_id)
                VALUES (:title,:summary, :description,:content, :importance,:thumbnail,:image_url,:keywords,:recommend,:active,:added_by,:added_date,:category_id)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
     
        $query->bindValue(":title",$title);
      
        $query->bindValue(":summary",$summary);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);     
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":category_id",$category_id,PDO::PARAM_INT);
        $query->bindValue(":recommend",$recommend,PDO::PARAM_BOOL);
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

    public function get_section_title($did){
      
        switch ($did) {
            case "16":
            return array(
                "category" => "主题",
                "article" => "文章",
                "section" => "产品展示",
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
                "section" => "产品展示",
            );
         }
    }

}