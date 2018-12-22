<?php
class Page{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM pages ORDER BY added_date DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM pages WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_page($id){
        $query = db::getInstance()->prepare("DELETE FROM `pages` WHERE id = ?");
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
    public function page_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `pages`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
       
    }
    //检测别名是否存在
    public function check_alias($id,$alias){
        if($id>0){
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `pages` WHERE id <> :id AND alias = :alias");  
            $query->bindValue(":id",$id,PDO::PARAM_INT);
            $query->bindValue(":alias",$alias); 

            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
        }else{
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `pages` WHERE alias = :alias");            
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
   public function update_page($id, $title,$alias,$keywords,$active, $description, $content) {

        $sql = "UPDATE pages SET title= :title,
             alias =:alias,        
             keywords = :keywords,
             description = :description,
             content = :content,
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":alias",$alias);      
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
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


    public function insert_page($title,$alias, $keywords,$active, $description, $content) {

        $sql="INSERT INTO pages (title,alias,keywords, description,content,active,added_by,added_date)
                VALUES (:title,:alias,:keywords, :description,:content, :active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":alias",$alias);       
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
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