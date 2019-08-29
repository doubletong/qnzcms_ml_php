<?php
namespace TZGCMS\Admin{
    class Carousel{

        public function get_paged_carousels($keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT id,title,description,link,importance, image_url ,added_date FROM carousels WHERE 1=1 ";
    
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
        public function get_carousels_count($keyword){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `carousels` where 1=1 ";

        
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword  OR content LIKE :keyword) ";
            }

            $query = \db::getInstance()->prepare($sql);    
            $query->bindValue(":keyword", $param);  
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        public function get_paged_carousels_v1($keyword,$pid,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.id,a.title,a.description,a.link,a.importance, a.image_url ,a.added_date,c.title as position_title FROM carousels as a 
            LEFT JOIN positions as c ON a.position_id = c.id

             WHERE 1=1 ";
    
            if(!empty($keyword)){
                $sql =  $sql. "AND (a.title LIKE :keyword OR a.content LIKE :keyword) ";
            }

            if(!empty($pid)){
                $sql =  $sql. "AND a.position_id = $pid ";
            }

            $sql =  $sql." ORDER BY a.importance DESC,a.id DESC LIMIT $startIndex, $pageSize ";

            $query = \db::getInstance()->prepare($sql);      
        
            $query->bindValue(":keyword", $param);  
            $query->execute();
            return $query->fetchAll();
        }
        
        //获取总数
        public function get_carousels_count_v1($keyword,$pid){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `carousels` where 1=1 ";

        
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword  OR content LIKE :keyword) ";
            }

            if(!empty($pid)){
                $sql =  $sql. "AND position_id = $pid ";
            }

            $query = \db::getInstance()->prepare($sql);    
            $query->bindValue(":keyword", $param);  
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        public function fetch_all(){
            global $dbh;
            $query = $dbh->prepare("SELECT * FROM carousels ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM carousels WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_carousel($id){
            $query = \db::getInstance()->prepare("DELETE FROM `carousels` WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            $result = $query->rowCount();
            if ($result>0) {
                return true;
            } else {
                return false;
            }
        }

        //获取总数
        public function carousel_count(){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `carousels`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        //更新产品
        public function update_carousel($id,$title, $position_id, $importance,$imageUrl,$image_url_mobile,$active, $description, $link) {

            $sql = "update carousels
                set
                title= :title,
                position_id=:position_id,
                description = :description,
                importance = :importance,
                image_url =:imageUrl,
                image_url_mobile = :image_url_mobile,
                link = :link,
                active =:active
                where id =:id";

            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":title",$title);
            $query->bindValue(":position_id",$position_id,\PDO::PARAM_INT);
            $query->bindValue(":description",$description);
            $query->bindValue(":link",$link);
            $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
            $query->bindValue(":imageUrl",$imageUrl);
            $query->bindValue(":image_url_mobile",$image_url_mobile);
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


        public function insert_carousel($title, $position_id, $importance,$imageUrl,$image_url_mobile,$active, $description, $link) {

            $sql="INSERT INTO carousels ( title,position_id,importance, description,image_url,image_url_mobile,link,active,added_by,added_date)
                    VALUES (:title,:position_id,:importance, :description,:imageUrl,:image_url_mobile, :link,:active,:added_by,:added_date)";

            $username = $_SESSION['valid_user'] ;

            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":title",$title);
            $query->bindValue(":position_id",$position_id,\PDO::PARAM_INT);
            $query->bindValue(":description",$description);
            $query->bindValue(":link",$link);
            $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
            $query->bindValue(":imageUrl",$imageUrl);
            $query->bindValue(":image_url_mobile",$image_url_mobile);
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
            $query->bindValue(":added_by",$username);
            $query->bindValue(":added_date",date('Y-m-d H:i:s'));
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