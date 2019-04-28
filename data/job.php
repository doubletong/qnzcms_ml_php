<?php
class Job{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM jobs ORDER BY importance ASC, id DESC");
        $query->execute();

        return $query->fetchAll();
    }
}