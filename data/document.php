<?php 
 class Document{

    public function get_all_years($did){
        $query = db::getInstance()->prepare("SELECT  DISTINCT DATE_FORMAT(FROM_UNIXTIME(`added_date`), '%Y') as year FROM documents WHERE active=1 AND dictionary_id = $did ORDER BY year DESC");
        $query->execute();

        return $query->fetchAll();
    }
 }