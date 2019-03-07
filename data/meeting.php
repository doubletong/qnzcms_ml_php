<?php
class Meeting{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM meetings ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }
   

    public function laster_meetings(){
        $query = db::getInstance()->prepare("SELECT * FROM meetings ORDER BY added_date DESC limit 3");
        $query->execute();
        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM meetings WHERE id = :id;UPDATE meetings SET view_count = view_count + 1 WHERE id =:id ;");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
  //获取前一条记录
    public function fetch_prev_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM meetings WHERE id = (SELECT MAX(id) FROM meetings WHERE id < :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
   //获取下一条记录
    public function fetch_next_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM meetings WHERE id = (SELECT MIN(id) FROM meetings WHERE id > :id);");
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        return $query->fetch();
    }
}