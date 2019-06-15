<?php
class Video{
    public function get_all_vidoe(){
        $query = db::getInstance()->prepare("SELECT * FROM videos WHERE active = 1 ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }
    public function fetch_all($did){
        $query = db::getInstance()->prepare("SELECT * FROM videos WHERE dictionary_id = $did AND active = 1 ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_videos WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }


}