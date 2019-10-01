<?php

namespace TZGCMS\Admin{

    require $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    use Models\Offer;

    //工作岗位
    class OfferRepository{
        

        public function get_paged_offers($keyword,$pageIndex,$pageSize){
            // $param = "%{$keyword}%";        
             $startIndex = ($pageIndex-1) * $pageSize;
            // $sql = "SELECT id,name,	address,department,population,importance,added_date FROM offers WHERE 1=1 ";
       
            // if(!empty($keyword)){
            //     $sql =  $sql. "AND (name LIKE :keyword OR content LIKE :keyword) ";
            // }
            // $sql =  $sql." ORDER BY importance DESC,id DESC LIMIT $startIndex, $pageSize ";

            // $query = \db::getInstance()->prepare($sql);      
        
            // $query->bindValue(":keyword", $param);  
            // $query->execute();
            // return $query->fetchAll();
            return Offer::orderBy('importance', 'desc')
            ->skip($startIndex)
            ->take($pageSize)
            ->get();
        }
        
        //获取总数
        public function get_offers_count($keyword){
            // $param = "%{$keyword}%";
            // $sql = "SELECT count(*) as count FROM `offers` where 1=1 ";         
            // if(!empty($keyword)){
            //     $sql =  $sql. "AND (name LIKE :keyword  OR content LIKE :keyword) ";
            // }

            // $query = \db::getInstance()->prepare($sql);    
            // $query->bindValue(":keyword", $param);  
            // $query->execute();        
            // $rows = $query->fetchColumn(); 
            // return $rows;
            return Offer::count();
   
        }


        public function fetch_all(){    
            $query = \db::getInstance()->prepare("SELECT * FROM offers ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = \db::getInstance()->prepare("SELECT * FROM offers WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_offer($id){
            $query = \db::getInstance()->prepare("DELETE FROM `offers` WHERE id = ?");
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
    public function active_offer($id) {

        $offer = Offer::find($id);
        
        $offer->active = ($offer->active==1)?0:1;
        $result = $offer->save();

        if (isset($result)) {
            $msg = array ('status'=>1,'message'=>'记录已成功更新。');
            return json_encode($msg);  
        } else {
            $msg = array ('status'=>3,'message'=>'未更新记录。');
            return json_encode($msg);              
        }
    }

    //精华或撤消
    public function recommend_offer($id) {
        $offer = Offer::find($id);
        
        $offer->recommend = ($offer->recommend==1)?0:1;
        $result = $offer->save();

        if (isset($result)) {
            $msg = array ('status'=>1,'message'=>'记录已成功更新。');
            return json_encode($msg);  
        } else {
            $msg = array ('status'=>3,'message'=>'未更新记录。');
            return json_encode($msg);  
            
        }
    }

            //获取总数
            public function offer_count(){
                $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `offers`");    
                $query->execute();        
                $rows = $query->fetchColumn(); 
                return $rows;
            }

            
  //更新
  public function update_offer($id, $name, $schools, $scholarship,$dictionary_id,$image_url , $importance, $active,$recommend) {

  
    $offer = Offer::find($id);
    $offer->name = $name;
    $offer->schools = $schools;
    $offer->scholarship = $scholarship;
    $offer->image_url = $image_url;
    $offer->dictionary_id = $dictionary_id;
    $offer->importance = $importance;
    $offer->active = $active;
    $offer->recommend = $recommend;

    $result = $offer->save();
    if (isset($result)) {
        $msg = array ('status'=>1,'message'=>'记录已成功更新。');
        return json_encode($msg);  
    } else {
        $msg = array ('status'=>3,'message'=>'未更新记录。');
        return json_encode($msg);  
      
    }
}


public function insert_offer($name, $schools, $scholarship,$dictionary_id,$image_url, $importance, $active,$recommend) {

    $username = $_SESSION['valid_user'] ;
    
    $result = Offer::create(
        [
         'name' => $name,
         'schools' =>  $schools,
         'scholarship' => $scholarship,
         'image_url' => $image_url,
         'dictionary_id' => $dictionary_id,
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