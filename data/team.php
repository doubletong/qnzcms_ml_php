<?php
class Team{ 
    public function get_all_teams(){
        $query = db::getInstance()->prepare("SELECT id,name,photo,post, dictionary_id FROM teams  ORDER BY importance DESC");    
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM teams WHERE id = :id;");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
}