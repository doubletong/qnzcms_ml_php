<?php
namespace TZGCMS\Admin{
class Team{
    public function get_paged_teams($did,$keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT a.id, a.name,a.post,a.importance,a.added_date,a.photo , d.title as category FROM teams as a  Left JOIN dictionaries as d ON d.id = a.dictionary_id WHERE 1=1 ";
        if(!empty($did)){
            $sql =  $sql. "AND a.dictionary_id = $did ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (a.name LIKE :keyword OR a.post LIKE :keyword OR a.content LIKE :keyword) ";
        }
        $sql =  $sql." ORDER BY a.importance DESC,a.id DESC LIMIT $startIndex, $pageSize ";

        $query = \db::getInstance()->prepare($sql);      
    
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_teams_count($did,$keyword){
        $param = "%{$keyword}%";

        $sql = "SELECT count(*) as count FROM `teams` where 1=1 ";

        if(!empty($did)){
            $sql =  $sql. "AND dictionary_id = $did ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (name LIKE :keyword OR post LIKE :keyword OR content LIKE :keyword) ";
        }

        $query = \db::getInstance()->prepare($sql);    
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }



    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM teams WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_team($id){
        $query = \db::getInstance()->prepare("DELETE FROM `teams` WHERE id = ?");
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
    public function team_count(){
        $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `teams`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_team($id, $name, $post, $photo,$fullphoto, $content, $dictionary_id,$importance) {

        $sql = "UPDATE teams SET name= :name,
           post =:post,
           photo =:photo,
           fullphoto =:fullphoto,
           content = :content,
           dictionary_id = :dictionary_id,
           importance = :importance
         
             WHERE id =:id";

        $query = \db::getInstance()->prepare($sql);

        $query->bindValue(":name",$name);
        $query->bindValue(":post",$post);
        $query->bindValue(":photo",$photo);
        $query->bindValue(":fullphoto",$fullphoto);
        $query->bindValue(":content",$content);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        
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


    public function insert_team($name, $post, $photo,$fullphoto, $content, $dictionary_id,$importance) {

        
        $sql="INSERT INTO `teams`(`name`, `post`, `photo`,`fullphoto`, `content`, `dictionary_id`, `importance`, `added_by`,`added_date`) 
        VALUES (:name, :post, :photo, :fullphoto,:content, :dictionary_id, :importance, :added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":name",$name);
        $query->bindValue(":post",$post);
        $query->bindValue(":photo",$photo);
        $query->bindValue(":fullphoto",$fullphoto);
        $query->bindValue(":content",$content);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
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