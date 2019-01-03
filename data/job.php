<?php
class Job{
    public function fetch_all(){
        $query = db::getInstance()->prepare("SELECT * FROM jobs ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }
}