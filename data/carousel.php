<?php
namespace TZGCMS{
class Carousel{
    public function fetch_all(){
        $query = \db::getInstance()->prepare("SELECT * FROM carousels ORDER BY importance DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function get_carousels($code){
        $query = \db::getInstance()->prepare("SELECT a.* FROM carousels as a 
        LEFT JOIN positions as c ON a.position_id = c.id WHERE c.code = '$code' AND a.active = 1 ORDER BY a.importance DESC");
        $query->execute();
        return $query->fetchAll();
    }


    public function fetch_data($id){
        $query = \db::getInstance()->prepare("SELECT * FROM carousels WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

}
}