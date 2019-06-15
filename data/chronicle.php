<?php

class Chronicle{

    //获取所有历程
    public function get_all_chronicles($did){
        $query = db::getInstance()->prepare("SELECT * FROM chronicles WHERE dictionary_id = $did  ORDER BY year DESC");
        $query->execute();

        return $query->fetchAll();
    }


}