<?php
class Topics{
    public function fetch_all(){
        $query = db::getInstance()->prepare("select t.id, t.title, Max(l.pubdate) as endDate,MIN(l.pubdate) as startDate
        from topics t left outer join media_links l on t.id = l.topicsId GROUP BY t.id, t.title ORDER BY t.added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function laster_topics(){
        $query = db::getInstance()->prepare("SELECT * FROM topics ORDER BY added_date DESC limit 4");
        $query->execute();
        return $query->fetchAll();
    }

}