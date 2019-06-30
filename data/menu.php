<?php
class Menu{
    public function get_all_menu($did){     
        $query = db::getInstance()->prepare("SELECT * FROM  menus WHERE active = 1 AND dictionary_id = ? ORDER BY importance DESC");
        $query->bindValue(1,$did);
        $query->execute();

        return $query->fetchAll();
    }

}