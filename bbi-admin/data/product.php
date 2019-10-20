<?php
namespace TZGCMS\Admin{
class Product{

    public function get_paged_products($cid,$keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT a.id, a.title, a.summary, a.thumbnail, a.view_count, a.recommend,a.importance,a.added_date, a.active, c.title as category_title FROM products as a 
        LEFT JOIN product_categories as c ON a.category_id = c.id
        where 1 = 1 ";
        if(!empty($cid)){
            $sql =  $sql. "AND a.category_id = $cid ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (a.title LIKE :keyword OR a.content LIKE  :keyword) ";
        }
        $sql =  $sql." ORDER BY a.importance DESC,a.id DESC LIMIT $startIndex, $pageSize ";
    
        $query = \db::getInstance()->prepare($sql);      
    
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_products_count($cid,$keyword){
        $param = "%{$keyword}%";
    
        $sql = "SELECT count(*) as count FROM `products` where 1 = 1 ";
    
        if(!empty($cid)){
            $sql =  $sql. "AND category_id = $cid ";
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
        $query = \db::getInstance()->prepare("SELECT id,title FROM products ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM products WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();
        return $query->fetch();
    }

    public function delete_product($id){
        $query = \db::getInstance()->prepare("DELETE FROM `products` WHERE id = ?");
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


  //显示或隐藏
  public function active_product($id) {

    $sql = "UPDATE products SET  
        active =ABS(active-1)
        WHERE id =:id";

    $query = \db::getInstance()->prepare($sql);           
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

//精华或撤消
public function recommend_product($id) {

    $sql = "UPDATE products SET    
        recommend =ABS(recommend-1)
        WHERE id =:id";

    $query = \db::getInstance()->prepare($sql);         
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


    public function copy_product($id){
        $query = \db::getInstance()->prepare("INSERT INTO `products` (title, summary, description,content,specifications,registration,importance,thumbnail,image_url,keywords,recommend,active,added_by,added_date,category_id,dictionary_id)
                                                     SELECT '新记录', summary, description,content,specifications,registration,0,thumbnail,image_url,keywords,recommend,active,added_by,UNIX_TIMESTAMP(now()),category_id,dictionary_id FROM `products` WHERE id = ? ");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            $msg = array ('status'=>1,'message'=>'记录已成功拷贝。');
            return json_encode($msg);  
        } else {
            $msg = array ('status'=>3,'message'=>'未拷贝记录。');
            return json_encode($msg);              
        }
    }

    //获取总数
    public function product_count(){
        $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `products`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_product($id, $title,$importance,$thumbnail,$image_url,$keywords,$recommend,$active,$summary, 
   $description, $content,$specifications,$registration, $category_id,$dictionary_id) {

        $sql = "UPDATE products SET           
             title= :title,
             summary = :summary,         
             content = :content,   
             specifications = :specifications,  
             registration = :registration,        
             importance = :importance,
             thumbnail =:thumbnail,
             image_url = :image_url,
             keywords = :keywords,
             description = :description,
             recommend = :recommend,           
             category_id = :category_id,      
          
             dictionary_id = :dictionary_id,  
             active =:active
             WHERE id =:id";
        

        $query = \db::getInstance()->prepare($sql);
   
        $query->bindValue(":title",$title);    
        $query->bindValue(":summary",$summary);      
        $query->bindValue(":content",$content);
        $query->bindValue(":specifications",$specifications);     
        $query->bindValue(":registration",$registration);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":description",$description);
        $query->bindValue(":keywords",$keywords);
      
        $query->bindValue(":category_id",$category_id,\PDO::PARAM_INT);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
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


    public function insert_product( $title, $importance,$thumbnail,
                                   $image_url,$keywords,$recommend,$active,$summary, $description, $content,$specifications,$registration,$category_id,$dictionary_id) {

        $sql="INSERT INTO products (title, summary, description,content,specifications,registration,importance,thumbnail,image_url,keywords,recommend,active,added_by,added_date,category_id,dictionary_id)
                VALUES (:title,:summary, :description,:content,:specifications, :registration,:importance,:thumbnail,:image_url,:keywords,:recommend,:active,:added_by,:added_date,:category_id,:dictionary_id)";

        $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
     
        $query->bindValue(":title",$title);
      
        $query->bindValue(":summary",$summary);
        $query->bindValue(":description",$description);        
        $query->bindValue(":content",$content);     
        $query->bindValue(":specifications",$specifications);   
        $query->bindValue(":registration",$registration);      
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":image_url",$image_url);
        $query->bindValue(":keywords",$keywords);
    
        $query->bindValue(":category_id",$category_id,\PDO::PARAM_INT);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
        $query->bindValue(":recommend",$recommend,\PDO::PARAM_BOOL);
        $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time());
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
                "product" => "文章",
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
                "product" => "文章",
                "section" => "产品展示",
            );
         }
    }

}

}