<?php
namespace TZGCMS\Admin{
        class ArticleCategory{
            public function get_paged_categories($did,$keyword,$pageIndex,$pageSize){
                $param = "%{$keyword}%";        
                $startIndex = ($pageIndex-1) * $pageSize;
                $sql = "SELECT * FROM article_categories WHERE 1=1 ";
                if(!empty($did)){
                    $sql =  $sql. "AND dictionary_id = $did ";
                }
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
            public function get_categories_count($did,$keyword){
                $param = "%{$keyword}%";
    
                $sql = "SELECT count(*) as count FROM `article_categories` where 1=1 ";
    
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

            public function fetch_all($did){     
                $query = \db::getInstance()->prepare("SELECT * FROM  article_categories WHERE dictionary_id = ? ORDER BY importance DESC");
                $query->bindValue(1,$did);
                $query->execute();

                return $query->fetchAll();
            }

            public function fetch_data($id){
                $query = \db::getInstance()->prepare("SELECT * FROM article_categories WHERE id = ?");
                $query->bindValue(1,$id);
                $query->execute();

                return $query->fetch();
            }

            public function delete_category($id){
                $query = \db::getInstance()->prepare("DELETE FROM `article_categories` WHERE id = ?");
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
                $query = db::getInstance()->prepare("SELECT count(*) as count FROM `article_categories`");    
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }

        //更新
        public function update_category($id, $title,$thumbnail,$thumbnail2, $dictionary_id, $parent_id, $product_ids, $importance,$active) {

                $sql = "UPDATE `article_categories` SET title= :title,
                thumbnail= :thumbnail,
                thumbnail2= :thumbnail2,
                dictionary_id =:dictionary_id,         
                parent_id =:parent_id,         
                product_ids =:product_ids,      
                importance =:importance,     
                active =:active 
                    WHERE id =:id";

                $query = \db::getInstance()->prepare($sql);

                $query->bindValue(":title",$title);
                $query->bindValue(":thumbnail",$thumbnail);      
                $query->bindValue(":thumbnail2",$thumbnail2);      
                $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);   
                $query->bindValue(":parent_id",$parent_id,\PDO::PARAM_INT);   
                $query->bindValue(":product_ids",$product_ids);   
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


            public function insert_category($title, $thumbnail, $thumbnail2, $dictionary_id,$parent_id,  $product_ids,$importance,$active) {

            
                $sql="INSERT INTO `article_categories`(`title`, `thumbnail`,`thumbnail2`, `dictionary_id`,   `parent_id`,  `product_ids`, `importance`, `active`,`added_date`) 
                VALUES (:title,:thumbnail, :thumbnail2, :dictionary_id, :parent_id,:product_ids, :importance, :active,:added_date)";

            // $username = $_SESSION['valid_user'] ;

                $query = \db::getInstance()->prepare($sql);
                $query->bindValue(":title",$title);
                $query->bindValue(":thumbnail",$thumbnail);     
                $query->bindValue(":thumbnail2",$thumbnail2);      
                $query->bindValue(":dictionary_id",$dictionary_id,\PDO::PARAM_INT);   
                $query->bindValue(":parent_id",$parent_id,\PDO::PARAM_INT);   
                $query->bindValue(":product_ids",$product_ids);   
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