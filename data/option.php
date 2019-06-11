<?php 

class SiteOption{

       public function get_config($name){     
        $query = db::getInstance()->prepare("SELECT * FROM  options WHERE config_name = ?");
        $query->bindValue(1,$name);
        $query->execute();
        return $query->fetch();
    }

}
?>