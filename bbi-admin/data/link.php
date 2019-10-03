<?php
namespace TZGCMS\Admin{
    require $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    use Models\Link;

    class LinkRepository{
        public function get_paged_links($did,$keyword,$pageIndex,$pageSize){
            $param = "%{$keyword}%";        
            $startIndex = ($pageIndex-1) * $pageSize;
            $sql = "SELECT a.*, d.title as category FROM links as a  Left JOIN dictionaries as d ON d.id = a.dictionary_id WHERE 1=1 ";
            if(!empty($did)){
                $sql =  $sql. "AND a.dictionary_id = $did ";
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
        public function get_links_count($did,$keyword){
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `links` where 1=1 ";

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
            $query = \db::getInstance()->prepare("SELECT * FROM links ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function get_by_id($id){
            return  Link::find($id);
        }

        public function delete_link($id){     

            $query = \db::getInstance()->prepare("DELETE FROM `links` WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();
            $result = $query->rowCount();
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
            public function link_count(){
                $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `links`");    
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }

    //更新产品
        public function update_link($id,$title,$description,$importance,$image_url,$active, $recommend, $url, $dictionary_id) {
        
            
            $vm = Link::find($id);

            $vm ->title = $title;
            $vm->description = $description;
            $vm->dictionary_id = $dictionary_id;
            $vm->image_url = $image_url;
            $vm->url = $url;
            $vm->importance = $importance;
            $vm->active = $active;
            $vm->recommend = $recommend;
        
            $result = $vm->save();
          

            if (isset($result)) {
                $msg = array ('status'=>1,'message'=>'记录已成功更新。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未更新记录。');
                return json_encode($msg);  
              
            }
        }

                                    
        public function insert_link($title,$description, $importance, $image_url, $active,$recommend, $url, $dictionary_id) {

       
            $username = $_SESSION['valid_user'] ;
 
            $result = Link::create(
                [
                 'title' => $title,
                 'description' =>  $description,
                 'dictionary_id' => $dictionary_id,
                 'image_url' => $image_url,
                 'url' => $url,
                 'importance' => $importance,
                 'active' => $active,
                 'recommend' => $recommend,
                 'created_by' => $username
                ]
               );
        
            if (isset($result)) {
                $msg = array ('status'=>1,'message'=>'新记录已成功创建。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未创建新记录。');
                return json_encode($msg);  
            }
        }

    }
}


