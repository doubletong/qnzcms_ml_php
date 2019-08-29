<?php
namespace TZGCMS\Admin{
    class Chronicle{
        public function get_paged_chronicles($did,$keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.*, d.title as category FROM chronicles as a  Left JOIN dictionaries as d ON d.id = a.dictionary_id WHERE 1=1 ";
            if(!empty($did)){
                $sql =  $sql. "AND a.dictionary_id = $did ";
            }
            if(!empty($keyword)){
                $sql =  $sql. "AND (a.title LIKE :keyword) ";
            }
            $sql =  $sql." ORDER BY a.year DESC,a.month DESC LIMIT $startIndex, $pageSize ";

            $query = \db::getInstance()->prepare($sql);      
        
            $query->bindValue(":keyword", $param);  
            $query->execute();
            return $query->fetchAll();
        }
        
        //获取总数
        public function get_chronicles_count($did,$keyword){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `chronicles` where 1=1 ";

            if(!empty($did)){
                $sql =  $sql. "AND dictionary_id = $did ";
            }
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
            global $dbh;
            $query = $dbh->prepare("SELECT id, title, thumbnail, active, improtance, added_by FROM chronicles ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM chronicles WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_chronicle($id){
            $query = \db::getInstance()->prepare("DELETE FROM `chronicles` WHERE id = ?");
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
        public function chronicle_count(){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `chronicles`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

    //更新
    public function update_chronicle($id, $year,$month,$image_url, $description,$dictionary_id) {

            $sql = "UPDATE chronicles SET year= :year,
            month= :month,
            image_url = :image_url,        
            description =:description,
            dictionary_id = :dictionary_id
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);
            
            $query->bindValue(":year",$year,\PDO::PARAM_INT);
            $query->bindValue(":month",$month,\PDO::PARAM_INT);
            $query->bindValue(":image_url",$image_url);       
        $query->bindValue(":description",$description);    
        $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);   
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


        public function insert_chronicle($year,$month,$image_url, $description,$dictionary_id) {

            $sql="INSERT INTO chronicles (year,month,image_url, description, dictionary_id, added_by,added_date)
                    VALUES (:year,:month,:image_url,:description,:dictionary_id,:added_by,:added_date)";

            $username = $_SESSION['valid_user'] ;
        
        
            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":year",$year,\PDO::PARAM_INT);
            $query->bindValue(":month",$month,\PDO::PARAM_INT);
            $query->bindValue(":image_url",$image_url);       
            $query->bindValue(":description",$description);         
            $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);    
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