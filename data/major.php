<?php
namespace TZGCMS{
    class Major{

        public function get_all_majors($did){
            $query = \db::getInstance()->prepare("SELECT * FROM majors WHERE active=1 AND dictionary_id = $did ORDER BY importance, id Desc");
            $query->execute();
    
            return $query->fetchAll();
        }
    }
}
?>