<?php
//工作岗位
class Topics{
    public function fetch_all(){    
        $query = db::getInstance()->prepare("SELECT * FROM topics ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM topics WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_topics($id){
        $query = db::getInstance()->prepare("DELETE FROM `topics` WHERE id = ?");
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
        public function topics_count(){
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `topics`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

//更新
    public function update_topics($id, $title) {

        

        $sql="UPDATE `topics` SET       
        `title`=:title       
            WHERE `id`=:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);      
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_topics($title) {    

        $sql="INSERT INTO topics(title, added_date, added_by) 
        VALUES (:title, :added_date, :added_by)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);       
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time());
        $query->execute();

        $result = $query->rowCount();
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}