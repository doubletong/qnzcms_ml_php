<?php
namespace TZGCMS\Admin{
    class School{

        public function get_paged_schools_v1($did,$cid,$keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.*, c.name as country_name,d.title as dictionary_title FROM schools as a 
            LEFT JOIN countries as c ON a.country_id = c.id
            LEFT JOIN dictionaries as d ON a.dictionary_id = d.id
            where 1=1 ";
            if(!empty($cid)){
                $sql =  $sql. "AND a.country_id = $cid ";
            }
            if(!empty($keyword)){
                $sql =  $sql. "AND (a.title LIKE :keyword) ";
            }
            $sql =  $sql." ORDER BY a.importance DESC,a.id DESC LIMIT $startIndex, $pageSize ";
        
            $query = \db::getInstance()->prepare($sql);      
        
            $query->bindValue(":keyword", $param);  
            $query->execute();
            return $query->fetchAll();
        }
        
        //获取总数
        public function get_schools_count_v1($did,$cid,$keyword){
            $param = "%{$keyword}%";
        
            $sql = "SELECT count(*) as count FROM `schools` where 1=1 ";
        
            if(!empty($cid)){
                $sql =  $sql. "AND country_id = $cid ";
            }
            if(!empty($keyword)){
                $sql =  $sql. "AND (title LIKE :keyword)";
            }
        
            $query = \db::getInstance()->prepare($sql);    
        
        //  $query->bindValue(":country_id", $cid, PDO::PARAM_INT);  
            $query->bindValue(":keyword", $param);  
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }


        
        public function fetch_all(){
         
            $query = \db::getInstance()->prepare("SELECT id, title, country_id, thumbnail, active, pubdate, added_by FROM schools ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM schools WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_school($id){
            $query = \db::getInstance()->prepare("DELETE FROM `schools` WHERE id = ?");
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
        public function school_count(){
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `schools`");    
            $query->execute();        
            $rows = $query->fetchColumn(); 
            return $rows;
        }

    //显示或隐藏
    public function active_school($id) {

        $sql = "UPDATE schools SET  
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

    //精华或撤消
    public function recommend_school($id) {
  
        $sql = "UPDATE schools SET    
            recommend =ABS(recommend-1)
            WHERE id =:id";

        $query = \db::getInstance()->prepare($sql);         
        $query->bindValue(":id",$id,\PDO::PARAM_INT);  
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            $msg = array ('status'=>1,'message'=>'记录已成功更新。' );
            return json_encode($msg);  
        } else {
            $msg = array ('status'=>3,'message'=>'未更新记录。' );
            return json_encode($msg);  
            
        }
    }


    //更新
    public function update_school($id, $title,$country_id,$dictionary_id,$image_url , $importance, $active,$recommend) {

            $sql = "UPDATE schools SET title= :title,
            country_id =:country_id,
            dictionary_id = :dictionary_id,
            importance = :importance,
                image_url = :image_url,
                recommend = :recommend,
                active =:active            
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);
         

            $query->bindValue(":title",$title);
            $query->bindValue(":country_id",$country_id);
            $query->bindValue(":dictionary_id",$dictionary_id);     
            $query->bindValue(":image_url",$image_url);
            $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
            $query->bindValue(":recommend",$recommend,\PDO::PARAM_BOOL);
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


        public function insert_school($title,$country_id,$dictionary_id,$image_url, $importance, $active,$recommend) {

            $sql="INSERT INTO schools (title,country_id,dictionary_id,image_url,importance,active,recommend,added_by,added_date)
                    VALUES (:title,:country_id,:dictionary_id, :image_url,:importance,:active,:recommend,:added_by,:added_date)";

            $username = $_SESSION['valid_user'] ;

            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":title",$title);
            $query->bindValue(":country_id",$country_id);
            $query->bindValue(":dictionary_id",$dictionary_id);          
            $query->bindValue(":image_url",$image_url);         
            $query->bindValue(":active",$active,\PDO::PARAM_BOOL);
            $query->bindValue(":recommend",$recommend,\PDO::PARAM_BOOL);
            $query->bindValue(":importance",$importance,\PDO::PARAM_INT);
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

        public function get_section_title($did){
        
            switch ($did) {
                case "16":
                return array(
                    "category" => "主题",
                    "school" => "文章",
                    "section" => "媒体报告",
                );
                break;
                case "banana":
                echo "Your favorite fruit is banana!";
                break;
                case "orange":
                echo "Your favorite fruit is orange!";
                break;
                default:
                return array(
                    "category" => "分类",
                    "school" => "文章",
                    "section" => "文章系统",
                );
            }
        }

    }
}