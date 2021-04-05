<?php
namespace TZGCMS{
class CaseShow{ 
    public function get_paged_cases($cid,$keyword,$pageIndex,$pageSize){
        $param = "%{$keyword}%";        
        $startIndex = ($pageIndex-1) * $pageSize;
        $sql = "SELECT a.id, a.title, a.summary, a.thumbnail,  a.pubdate, c.title as category_title FROM cases as a 
        LEFT JOIN case_categories as c ON a.categoryId = c.id
        where a.active = 1 ";
        if(!empty($cid)){
            $sql =  $sql. "AND a.categoryId = $cid ";
        }
        if(!empty($keyword)){
            $sql =  $sql. "AND (a.title LIKE :keyword OR a.content LIKE  :keyword) ";
        }
        $sql =  $sql." ORDER BY a.pubdate DESC,a.id DESC LIMIT $startIndex, $pageSize ";
    
        $query = \db::getInstance()->prepare($sql);      
     
        $query->bindValue(":keyword", $param);  
        $query->execute();
        return $query->fetchAll();
    }
    
    //获取总数
    public function get_cases_count($cid,$keyword){
        $param = "%{$keyword}%";
    
        $sql = "SELECT count(*) as count FROM `cases` where active = 1 ";
    
        if(!empty($cid)){
            $sql =  $sql. "AND categoryId = $cid ";
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



    public function get_all_categories(){
        $query = \db::getInstance()->prepare("SELECT * FROM case_categories WHERE active = 1 ORDER BY importance DESC,id DESC");      
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_category($category){
        $query = \db::getInstance()->prepare("SELECT * FROM cases WHERE category = :category ORDER BY added_date DESC");
        $query->bindValue(":category",$category,PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll();
    }

    public function get_recommend_cases(){
        $query = \db::getInstance()->prepare("SELECT * FROM cases WHERE recommend = 1 ORDER BY importance DESC limit 0,12");      
        $query->execute();

        return $query->fetchAll();
    }

    public function get_case_by($id){
        $query = \db::getInstance()->prepare("SELECT a.*,c.title as category_title FROM cases as a  LEFT JOIN case_categories as c ON a.categoryId = c.id WHERE a.id = :id;UPDATE cases SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
    
  //获取前一条记录
    public function fetch_prev_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM cases WHERE id = (SELECT MAX(id) FROM cases WHERE id < :id);");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM cases WHERE id = (SELECT MIN(id) FROM cases WHERE id > :id);");
        $query->bindValue(":id",$id,\PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }

}

}