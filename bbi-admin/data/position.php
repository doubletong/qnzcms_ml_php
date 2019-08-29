<?php
namespace TZGCMS\Admin{
class Position{
    public function get_paged_positions($keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT id,title,importance,code,added_date FROM positions WHERE 1=1 ";
   
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
    public function get_positions_count($keyword){
        $param = "%{$keyword}%";

        $sql = "SELECT count(*) as count FROM `positions` where 1=1 ";

     
        if(!empty($keyword)){
            $sql =  $sql. "AND (title LIKE :keyword  OR content LIKE :keyword) ";
        }

        $query = \db::getInstance()->prepare($sql);    
        $query->bindValue(":keyword", $param);  
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function get_all(){     
        $query = \db::getInstance()->prepare("SELECT * FROM  positions ORDER BY importance DESC");     
        $query->execute();

        return $query->fetchAll();
    }


    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM positions WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_position($id){
        $query = \db::getInstance()->prepare("DELETE FROM `positions` WHERE id = ?");
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
    public function position_count(){
        $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `positions`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
       
    }
    //检测别名是否存在
    public function check_code($id,$code){
        if($id>0){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `positions` WHERE id <> :id AND code = :code");  
            $query->bindValue(":id",$id,\PDO::PARAM_INT);
            $query->bindValue(":code",$code); 

            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
        }else{
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `positions` WHERE code = :code");            
            $query->bindValue(":code",$code);             
            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
        }
       
    }

    //更新
   public function update_position($id, $title, $code,$importance,$active) {

        $sql = "UPDATE positions SET title= :title,
             code =:code,      
             importance = :importance,              
             active =:active
             WHERE id =:id";

        $query = \db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":code",$code); 
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);    
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


    public function insert_position($title,$code, $importance,$active) {

        $sql="INSERT INTO positions (title,code,importance,active,added_by,added_date)
                VALUES (:title,:code,:importance, :active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":code",$code); 
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
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