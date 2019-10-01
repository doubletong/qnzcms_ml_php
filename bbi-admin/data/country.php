<?php
namespace TZGCMS\Admin{
        class Country{
            public function get_paged_countries($keyword,$pageIndex,$pageSize){
                $param = "%{$keyword}%";        
                $startIndex = ($pageIndex-1) * $pageSize;
                $sql = "SELECT c.* FROM countries as c  WHERE 1=1 ";
              
                if(!empty($keyword)){
                    $sql =  $sql. "AND (c.name LIKE :keyword) ";
                }
                $sql =  $sql." ORDER BY c.importance DESC,c.id DESC LIMIT $startIndex, $pageSize ";
    
                $query = \db::getInstance()->prepare($sql);      
            
                $query->bindValue(":keyword", $param);  
                $query->execute();
                return $query->fetchAll();
            }
            
            //获取总数
            public function get_countries_count($keyword){
                $param = "%{$keyword}%";
    
                $sql = "SELECT count(*) as count FROM `countries` where 1=1 ";
    
           
                if(!empty($keyword)){
                    $sql =  $sql. "AND (name LIKE :keyword) ";
                }
    
                $query = \db::getInstance()->prepare($sql);    
                $query->bindValue(":keyword", $param);  
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }

            public function fetch_all($did){     
                $query = \db::getInstance()->prepare("SELECT * FROM  countries WHERE dictionary_id = ? ORDER BY importance DESC");
                $query->bindValue(1,$did);
                $query->execute();

                return $query->fetchAll();
            }

            public function get_all(){     
                $query = \db::getInstance()->prepare("SELECT * FROM  countries ORDER BY importance DESC");           
                $query->execute();
                return $query->fetchAll();
            }

            public function fetch_data($id){
                $query = \db::getInstance()->prepare("SELECT * FROM countries WHERE id = ?");
                $query->bindValue(1,$id);
                $query->execute();

                return $query->fetch();
            }

            public function delete_category($id){
                $query = \db::getInstance()->prepare("DELETE FROM `countries` WHERE id = ?");
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

    //显示或隐藏
    public function active_category($id) {

        $sql = "UPDATE countries SET  
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

            //获取总数
            public function case_count(){
                $query = db::getInstance()->prepare("SELECT count(*) as count FROM `countries`");    
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }




        //更新
        public function update_category($id, $name,  $importance,$active) {

                $sql = "UPDATE `countries` SET name= :name,          
               
                importance =:importance,     
                active =:active 
                    WHERE id =:id";

                $query = \db::getInstance()->prepare($sql);

                $query->bindValue(":name",$name);            
           
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


            public function insert_category($name,  $importance,$active) {

            
                $sql="INSERT INTO `countries`(`name`,   `importance`, `active`,`added_date`) 
                VALUES (:name,   :importance, :active,:added_date)";

            // $username = $_SESSION['valid_user'] ;

                $query = \db::getInstance()->prepare($sql);
                $query->bindValue(":name",$name);              
                        
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