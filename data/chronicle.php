<?php
namespace TZGCMS{
    class Chronicle{

        //获取所有历程
        public function get_all_chronicles_v1(){
            $query = \db::getInstance()->prepare("SELECT * FROM chronicles   ORDER BY year DESC, month DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function get_years(){
            $query = \db::getInstance()->prepare("SELECT DISTINCT year FROM chronicles  ORDER BY year DESC");
            $query->execute();

            return $query->fetchAll();
        }


        public function get_all_chronicles($did){
            $query = \db::getInstance()->prepare("SELECT * FROM chronicles WHERE dictionary_id = $did  ORDER BY year DESC");
            $query->execute();

            return $query->fetchAll();
        }
    }
}