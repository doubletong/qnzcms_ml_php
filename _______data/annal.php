<?php
namespace TZGCMS{
    class Annal{

        //获取所有历程
        public function get_all_annals_v1(){
            $query = \db::getInstance()->prepare("SELECT * FROM annals   ORDER BY year DESC, month DESC");
            $query->execute();

            return $query->fetchAll();
        }

        public function get_years(){
            $query = \db::getInstance()->prepare("SELECT DISTINCT year FROM annals  ORDER BY year DESC");
            $query->execute();

            return $query->fetchAll();
        }


        public function get_all_annals($did){
            $query = \db::getInstance()->prepare("SELECT * FROM annals WHERE dictionary_id = $did  ORDER BY year DESC");
            $query->execute();

            return $query->fetchAll();
        }
    }
}