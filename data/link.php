<?php
namespace TZGCMS{
    class Link{
        public function get_links_bydid($did){
            $query = \db::getInstance()->prepare("SELECT * FROM links WHERE active = 1 AND dictionary_id = $did ORDER BY importance DESC");
            $query->execute();
            return $query->fetchAll();
        }

        public function fetch_data($id){
            $query = db::getInstance()->prepare("SELECT * FROM links WHERE id = ?");
            $query->bindValue(1,$id);
            $query->execute();

            return $query->fetch();
        }
    }
}