<?php
//工作岗位
class Job{
    public function fetch_all(){    
        $query = db::getInstance()->prepare("SELECT * FROM jobs ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM jobs WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_job($id){
        $query = db::getInstance()->prepare("DELETE FROM `jobs` WHERE id = ?");
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
        public function job_count(){
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `jobs`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

//更新
    public function update_job($id,$title, $department, $address, $population, $content) {

        

        $sql="UPDATE `jobs` SET       
        `title`=:title,
        `department`=:department,
        `address`=:address,
        `population`=:population,
        `content`=:content
            WHERE `id`=:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":department",$department);
        $query->bindValue(":address",$address);
        $query->bindValue(":content",$content);
        $query->bindValue(":population",$population,PDO::PARAM_INT);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_job($title, $department, $address, $population, $content) {

    

$sql="INSERT INTO jobs(title, department, address, population, content, added_date, added_by) 
VALUES (:title, :department, :address, :population, :content, :added_date, :added_by)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":department",$department);
        $query->bindValue(":address",$address);
        $query->bindValue(":content",$content);
        $query->bindValue(":population",$population,PDO::PARAM_INT);
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

}