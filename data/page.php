<?php
class Page{
   

    public function fetch_data($alias){
        $query = db::getInstance()->prepare("SELECT * FROM pages WHERE alias = :alias;UPDATE pages SET view_count = view_count + 1 WHERE alias =:alias ;");
        $query->bindValue(":alias",$alias,PDO::PARAM_STR);
        $query->execute();

        return $query->fetch();
    }
  
}