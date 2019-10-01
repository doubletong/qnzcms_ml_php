<?php
namespace TZGCMS\Admin{
    //工作岗位
    class Job{
        public function get_paged_jobs($keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT id,title,	address,department,population,importance,added_date FROM jobs WHERE 1=1 ";
       
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
        public function get_jobs_count($keyword){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `jobs` where 1=1 ";

         
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword  OR content LIKE :keyword) ";
            }

            $query = \db::getInstance()->prepare($sql);    
            $query->bindValue(":keyword", $param);  
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        public function fetch_all(){    
            $query = \db::getInstance()->prepare("SELECT * FROM jobs ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM jobs WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_job($id){
            $query = \db::getInstance()->prepare("DELETE FROM `jobs` WHERE id = ?");
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
            public function job_count(){
                $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `jobs`");    
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }


    //更新
    public function update_job($id,$title, $department, $address, $population, $content,$importance) {

        $sql="UPDATE `jobs` SET       
        `title`=:title,
        `department`=:department,
        `address`=:address,
        `population`=:population,
        `content`=:content,
        `importance`=:importance
            WHERE `id`=:id";

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":department",$department);
        $query->bindValue(":address",$address);
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":population",$population,\PDO::PARAM_INT);
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


    public function insert_job($title, $department, $address, $population, $content,  $importance) {



    $sql="INSERT INTO jobs(title, department, address, population, content, importance, added_date, added_by) 
    VALUES (:title, :department, :address, :population, :content,  :importance,  :added_date, :added_by)";

        $username = $_SESSION['valid_user'] ;

        $query = \db::getInstance()->prepare($sql);
        $query->bindValue(":title",$title);
        $query->bindValue(":department",$department);
        $query->bindValue(":address",$address);
        $query->bindValue(":content",$content);
        $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
        $query->bindValue(":population",$population,\PDO::PARAM_INT);
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

    }
}