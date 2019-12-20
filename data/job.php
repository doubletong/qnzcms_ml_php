<?php
namespace TZGCMS{
class Job{
    // public function fetch_all(){
    //     $query = db::getInstance()->prepare("SELECT * FROM jobs ORDER BY importance ASC, id DESC");
    //     $query->execute();
    //     return $query->fetchAll();
    // }

    static $pageSize = 10;
   // Job::$pageSize 

    public function get_paged_jobs_v1($city,$keyword,$pageIndex){
        $pageSize = Job::$pageSize;

        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT * FROM jobs  where 1 = 1 ";
        if(!empty($city)){
            $sql =  $sql. "AND department = '$city' ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (title LIKE :keyword OR content LIKE  :keyword) ";
        }
        $sql =  $sql." ORDER BY importance DESC,id DESC LIMIT $startIndex, $pageSize ";
    
        $query = \db::getInstance()->prepare($sql);      
     
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_jobs_count_v1($city,$keyword){
        $param = "%{$keyword}%";
    
        $sql = "SELECT count(*) as count FROM `jobs` where 1 = 1 ";
    
        if(!empty($city)){
            $sql =  $sql. "AND department = '$city' ";
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
}
}