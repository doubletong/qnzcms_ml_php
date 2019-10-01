<?php
namespace TZGCMS\Admin{
class Menu{
    public function fetch_all($did){     
        $query = \db::getInstance()->prepare("SELECT * FROM  menus WHERE dictionary_id = ? ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM menus WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_menu($id){
        $query = \db::getInstance()->prepare("DELETE FROM `menus` WHERE id = ?");
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
    public function case_count(){
        $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `menus`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_menu($id, $title,$description, $url,$parent_id, $dictionary_id, $importance,$active) {

        $sql = "UPDATE `menus` SET title= :title,
        description = :description,
        url = :url,
        parent_id =:parent_id,     
           dictionary_id =:dictionary_id,         
           importance =:importance,     
           active =:active 
             WHERE id =:id";

        $query = \db::getInstance()->prepare($sql);

        $query->bindValue(":title",$title);
        $query->bindValue(":description",$description);      
        $query->bindValue(":url",$url);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
        $query->bindValue(":parent_id",$parent_id,\PDO::PARAM_INT);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
     //   echo $description;
        if ($result>0) {
            $msg = array ('status'=>1,'message'=>'记录已成功更新。');
            return json_encode($msg);  
        } else {
            $msg = array ('status'=>3,'message'=>'未更新记录。');
            return json_encode($msg);              
        }
    }


    public function insert_menu($title,$description,$url,$parent_id, $dictionary_id, $importance,$active) {

      
        $sql="INSERT INTO `menus`(`title`,  `description`, `url`, `parent_id`,`dictionary_id`,  `importance`, `active`) 
        VALUES (:title,:description, :url,:parent_id,:dictionary_id, :importance, :active)";

       // $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":description",$description);
        $query->bindValue(":url",$url);
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);
        $query->bindValue(":parent_id",$parent_id,\PDO::PARAM_INT);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
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