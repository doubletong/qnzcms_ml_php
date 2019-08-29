<?php
namespace TZGCMS\Admin{
class Page{
    public function get_paged_pages($keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT id,title,importance,alias,view_count,added_date FROM pages WHERE 1=1 ";
   
        if(!empty($keyword)){
            $sql =  $sql. "AND (title LIKE :keyword OR content LIKE :keyword) ";
        }
        $sql =  $sql." ORDER BY importance DESC,id DESC LIMIT $startIndex, $pageSize ";

        $query = \db::getInstance()->prepare($sql);      
    
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_pages_count($keyword){
        $param = "%{$keyword}%";

        $sql = "SELECT count(*) as count FROM `pages` where 1=1 ";

     
        if(!empty($keyword)){
            $sql =  $sql. "AND (title LIKE :keyword  OR content LIKE :keyword) ";
        }

        $query = \db::getInstance()->prepare($sql);    
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

  

    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM pages WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_page($id){
        $query = \db::getInstance()->prepare("DELETE FROM `pages` WHERE id = ?");
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
    public function page_count(){
        $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `pages`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
       
    }
    //检测别名是否存在
    public function check_alias($id,$alias){
        if($id>0){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `pages` WHERE id <> :id AND alias = :alias");  
            $query->bindValue(":id",$id,\PDO::PARAM_INT);
            $query->bindValue(":alias",$alias); 

            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
        }else{
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `pages` WHERE alias = :alias");            
            $query->bindValue(":alias",$alias);             
            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
        }
       
    }

    //更新
   public function update_page($id, $title, $alias,$importance,$keywords,$active, $description, $content,$background_image) {

        $sql = "UPDATE pages SET title= :title,
             alias =:alias,      
             importance = :importance,  
             keywords = :keywords,
             description = :description,
             content = :content,
             background_image = :background_image,
             active =:active
             WHERE id =:id";

        $query = \db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":alias",$alias);      
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":background_image",$background_image);
        $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
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


    public function insert_page($title,$alias, $importance, $keywords,$active, $description, $content,$background_image) {

        $sql="INSERT INTO pages (title,alias,importance,keywords, description,content,background_image,active,added_by,added_date)
                VALUES (:title,:alias,:importance,:keywords, :description,:content,:background_image, :active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":alias",$alias);       
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":background_image",$background_image);
        $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
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

}
}