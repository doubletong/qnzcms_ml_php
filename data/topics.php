<?php
class Topics{
    public function fetch_all(){
        $query = db::getInstance()->prepare("select t.id, t.title, Max(l.added_date) as endDate,MIN(l.added_date) as startDate
        from topics t left outer join media_links l on t.id = l.topicsId GROUP BY t.id, t.title ORDER BY t.added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

}