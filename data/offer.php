<?php
namespace TZGCMS{
    require $_SERVER['DOCUMENT_ROOT']."/config/database.php";
    use Models\Offer;

    //工作岗位
    class OfferRepository{

        public function get_paged_offers($did,$pageIndex,$pageSize){
           
            $startIndex = ($pageIndex-1) * $pageSize;
           $query = Offer::where('active',1)->select('name','importance','schools','scholarship','created_at','active','recommend','image_url','dictionary_id','id');

           if ($did){
               $query->where('dictionary_id',$did);
           }
          
           return $query->orderBy('importance', 'desc')
           ->skip($startIndex)
           ->take($pageSize)
           ->get();
       }
       
       //获取总数
       public function get_offers_count($did){          
           $query = Offer::where('active',1)->select('id');
           if ($did){
               $query->where('dictionary_id',$did);
           }       
           return $query->count();  
       }


       //按分类获取最近新闻
        public function recommend_offers($count){
            $query = \db::getInstance()->prepare("SELECT a.id, a.name, a.schools, a.image_url,  a.scholarship, c.title as dic_title FROM offers as a 
            LEFT JOIN dictionaries as c ON a.dictionary_id = c.id WHERE a.recommend = 1 ORDER BY a.importance DESC limit $count");
            $query->execute();
            return $query->fetchAll();
        }

        public function recommend_type_offers($did, $count){
            $query = \db::getInstance()->prepare("SELECT a.id, a.name, a.schools, a.image_url,  a.scholarship, c.title as dic_title FROM offers as a 
            LEFT JOIN dictionaries as c ON a.dictionary_id = c.id WHERE a.dictionary_id=$did and a.recommend = 1 ORDER BY a.importance DESC limit $count");
            $query->execute();
            return $query->fetchAll();
        }

    }
}
?>