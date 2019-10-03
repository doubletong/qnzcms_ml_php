<?php

namespace TZGCMS\Admin{

    require $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    use Models\Offer;

    //工作岗位
    class OfferRepository{
        

        public function get_paged_offers($did,$keyword,$pageIndex,$pageSize){
           
             $startIndex = ($pageIndex-1) * $pageSize;

            $query = Offer::select('name','importance','schools','scholarship','created_at','active','recommend','image_url','dictionary_id','id');

            if ($did){
                $query->where('dictionary_id',$did);
            }
            if ($keyword){
                $query->where('name','like','%'+$keyword+'%')->orWhere('schools','like','%'+$keyword+'%');
            }
            
            return $query->orderBy('importance', 'desc')
            ->skip($startIndex)
            ->take($pageSize)
            ->get();
        }
        
        //获取总数
        public function get_offers_count($did,$keyword){
           
            $query = Offer::select('id');

            if ($did){
                $query->where('dictionary_id',$did);
            }
            if ($keyword){
                $query->where('name','like','%'+$keyword+'%')->orWhere('schools','like','%'+$keyword+'%');
            }
            return $query->count();
   
        }


        public function fetch_all(){    
            $query = \db::getInstance()->prepare("SELECT * FROM offers ORDER BY added_date DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function fetch_data($id){      
            return  Offer::find($id);
        }

        public function delete_offer($id){
      
            $offer = Offer::find($id);

            $result = $offer->delete();;
            //1-success 2-error 3-info 4-warrning
            if (isset($result)) {
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
  public function update_offer($id, $name, $schools, $scholarship,$dictionary_id,$thumbnail , $image_url , $importance, $active,$recommend) {

  
    $offer = Offer::find($id);
    $offer->name = $name;
    $offer->schools = $schools;
    $offer->scholarship = $scholarship;
    $offer->thumbnail = $thumbnail;
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


public function insert_offer($name, $schools, $scholarship,$dictionary_id,$thumbnail ,$image_url, $importance, $active,$recommend) {

    $username = $_SESSION['valid_user'] ;
    
    $result = Offer::create(
        [
         'name' => $name,
         'schools' =>  $schools,
         'scholarship' => $scholarship,
         'thumbnail' => $thumbnail,
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