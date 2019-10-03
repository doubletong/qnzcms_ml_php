<?php
namespace TZGCMS{
    class School{

        public function get_paged_schools($did,$cid,$pageIndex,$pageSize){
       
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.*, c.name as country_name,d.title as dictionary_title FROM schools as a 
            LEFT JOIN countries as c ON a.country_id = c.id
            LEFT JOIN dictionaries as d ON a.dictionary_id = d.id
            WHERE a.active = 1 ";

            if(!empty($cid)){
                $sql =  $sql. "AND a.country_id = $cid ";
            }
         
            $sql =  $sql." ORDER BY a.importance DESC,a.id DESC LIMIT $startIndex, $pageSize ";
        
            $query = \db::getInstance()->prepare($sql);      
        
            $query->execute();
            return $query->fetchAll();
        }
        
        //获取总数
        public function get_schools_count($did,$cid){         
        
            $sql = "SELECT count(*) as count FROM `schools` WHERE active = 1 ";
        
            if(!empty($cid)){
                $sql =  $sql. "AND country_id = $cid ";
            }
          
        
            $query = \db::getInstance()->prepare($sql);    
        
        //  $query->bindValue(":country_id", $cid, PDO::PARAM_INT);  
 
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        public function get_countries(){     
            $query = \db::getInstance()->prepare("SELECT * FROM  countries WHERE active = 1 ORDER BY importance DESC");           
            $query->execute();
            return $query->fetchAll();
        }

        
        public function get_recommend_schools($did,$count){
            $sql = "SELECT *  FROM schools WHERE active = 1 AND recommend=1 AND dictionary_id = $did ORDER BY importance DESC LIMIT $count";
            $query = \db::getInstance()->prepare($sql); 
            $query->execute();
            return $query->fetchAll();
        }

    }
}
?>