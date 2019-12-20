<?php
class Document{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT id, title, thumbnail, active, improtance, added_by FROM documents ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM documents WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_document($id){
        $query = db::getInstance()->prepare("DELETE FROM `documents` WHERE id = ?");
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
    public function document_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `documents`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    
 //显示或隐藏
 public function active_document($id) {

    $sql = "UPDATE `documents` SET  
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
    //拷贝记录
public function copy_document($id){
    $query = \db::getInstance()->prepare("INSERT INTO `documents` (`title`, `description`, `file_url`, `thumbnail`, `file_size`, `dictionary_id`,  `importance`,  `active`,  `added_by`, `added_date`)
                                                 SELECT concat(`title`,'【拷贝】'), `description`,  `file_url`,`thumbnail`, `file_size`, `dictionary_id`,  `importance`,  0,  `added_by`,  UNIX_TIMESTAMP(now())  FROM `documents` WHERE id = ? ");
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

//更新
   public function update_document($id, $title,$description, $file_url,$file_size,$thumbnail,$importance,$dictionary_id, $active) {

        $sql = "UPDATE documents SET title= :title,
        description = :description,
           file_url =:file_url,    
           file_size = :file_size,    
           thumbnail =:thumbnail, 
             importance = :importance, 
             dictionary_id = :dictionary_id,          
             active =:active
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);
          
        $query->bindValue(":title",$title);
        $query->bindValue(":description",$description);
       $query->bindValue(":file_url",$file_url);
       $query->bindValue(":file_size",$file_size);    
       $query->bindValue(":thumbnail",$thumbnail);
       $query->bindValue(":importance",$importance,PDO::PARAM_INT);  
       $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);  
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);    
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_document( $title,$description,$file_url,$file_size,$thumbnail,$importance,$dictionary_id, $active) {

        $sql="INSERT INTO documents (title,description,file_url,file_size,thumbnail,importance,dictionary_id, active, added_by,added_date)
                VALUES (:title,:description,:file_url,:file_size,:thumbnail,:importance,:dictionary_id,:active,:added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;
      
     
        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":description",$description);
        $query->bindValue(":file_url",$file_url);    
        $query->bindValue(":file_size",$file_size);    
        $query->bindValue(":thumbnail",$thumbnail);     
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);  
        $query->bindValue(":dictionary_id",$dictionary_id,PDO::PARAM_INT);  
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time(),PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

}