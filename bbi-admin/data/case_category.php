<?php
namespace TZGCMS\Admin{
    class CaseCategory{
        public function get_paged_categories($keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT * FROM case_categories WHERE 1=1 ";
      
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword) ";
            }
            $sql =  $sql." ORDER BY importance DESC,id DESC LIMIT $startIndex, $pageSize ";

            $query = \db::getInstance()->prepare($sql);      
        
            $query->bindValue(":keyword", $param);  
            $query->execute();
            return $query->fetchAll();
        }
        
        //获取总数
        public function get_categories_count($keyword){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `case_categories` where 1=1 ";
    
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword) ";
            }

            $query = \db::getInstance()->prepare($sql);    
            $query->bindValue(":keyword", $param);  
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

        public function fetch_all(){
        
            $query = \db::getInstance()->prepare("SELECT * FROM  case_categories ORDER BY importance DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM case_categories WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_case($id){
            $query = \db::getInstance()->prepare("DELETE FROM `case_categories` WHERE id = ?");
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
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `case_categories`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

    //更新
    public function update_case($id, $title, $title_en, $imageurl,$importance,$active) {

            $sql = "UPDATE `case_categories` SET title= :title,
            title_en =:title_en,
            imageurl =:imageurl,
            importance =:importance,     
            active =:active 
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);

            $query->bindValue(":title",$title);
            $query->bindValue(":title_en",$title_en);
            $query->bindValue(":imageurl",$imageurl);
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


        public function insert_case($title, $title_en, $imageurl,$importance,$active) {

        
            $sql="INSERT INTO `case_categories`(`title`, `title_en`, `imageurl`, `importance`, `active`,`added_date`) 
            VALUES (:title,:title_en, :imageurl,:importance, :active,:added_date)";

        // $username = $_SESSION['valid_user'] ;

            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":title",$title);
            $query->bindValue(":title_en",$title_en);
            $query->bindValue(":imageurl",$imageurl);
            $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
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