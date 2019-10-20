<?php

namespace TZGCMS\Admin {
    class CaseShow
    {

        public function get_paged_cases_v1($cid, $keyword, $pageIndex, $pageSize)
        {
            $param = "%{$keyword}%";
            $startIndex = ($pageIndex - 1) * $pageSize;
            $sql = "SELECT a.id, a.title, a.summary, a.thumbnail, a.view_count, a.importance ,a.recommend ,  a.pubdate, a.active, c.title as category_title FROM cases as a 
        LEFT JOIN case_categories as c ON a.categoryId = c.id
        where 1 = 1 ";
            if (!empty($cid)) {
                $sql =  $sql . "AND a.categoryId = $cid ";
            }
            if (!empty($keyword)) {
                $sql =  $sql . "AND (a.title LIKE :keyword OR a.content LIKE  :keyword) ";
            }
            $sql =  $sql . " ORDER BY a.pubdate DESC,a.id DESC LIMIT $startIndex, $pageSize ";

            $query = \db::getInstance()->prepare($sql);

            $query->bindValue(":keyword", $param);
            $query->execute();
            return $query->fetchAll();
        }

        //获取总数
        public function get_cases_count_v1($cid, $keyword)
        {
            $param = "%{$keyword}%";

            $sql = "SELECT count(*) as count FROM `cases` where 1 = 1 ";

            if (!empty($cid)) {
                $sql =  $sql . "AND categoryId = $cid ";
            }
            if (!empty($keyword)) {
                $sql =  $sql . "AND (title LIKE :keyword OR content LIKE  :keyword)";
            }

            $query = \db::getInstance()->prepare($sql);

            //  $query->bindValue(":category_id", $cid, PDO::PARAM_INT);  
            $query->bindValue(":keyword", $param);
            $query->execute();
            $rows = $query->fetchColumn();
            return $rows;
        }



        public function fetch_data($id)
        {
            $query = \db::getInstance()->prepare("SELECT * FROM cases WHERE id = ?");
            $query->bindValue(1, $id);
            $query->execute();

            return $query->fetch();
        }

        public function delete_case($id)
        {
            $query = \db::getInstance()->prepare("DELETE FROM `cases` WHERE id = ?");
            $query->bindValue(1, $id);
            $query->execute();

            $result = $query->rowCount();;
            //1-success 2-error 3-info 4-warrning
            if ($result > 0) {
                $msg = array('status' => 1, 'message' => '记录已成功删除。');
                return json_encode($msg);
            } else {
                $msg = array('status' => 3, 'message' => '未删除记录。');
                return json_encode($msg);
            }
        }

        //显示或隐藏
        public function active_case($id) {

            $sql = "UPDATE cases SET  
                active =ABS(active-1)
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);           
            $query->bindValue(":id",$id,\PDO::PARAM_INT);
            $query->execute();

            $result = $query->rowCount();;
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'记录已成功更新。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未更新记录。');
                return json_encode($msg);  
                
            }
        }

        //精华或撤消
        public function recommend_case($id) {

            $sql = "UPDATE cases SET    
                recommend =ABS(recommend-1)
                WHERE id =:id";

            $query = \db::getInstance()->prepare($sql);         
            $query->bindValue(":id",$id,\PDO::PARAM_INT);  
            $query->execute();

            $result = $query->rowCount();;
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'记录已成功更新。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未更新记录。');
                return json_encode($msg);  
                
            }
        }

        //拷贝记录
        public function copy_case($id){
            $query = \db::getInstance()->prepare("INSERT INTO `cases` (`title`, `body`, `pubdate`, `description`, `keywords`,   `view_count`, `active`, `recommend`, `added_by`, `importance`, `thumbnail`, `added_date`, `categoryid`, `summary`)
                                                        SELECT concat(`title`,'【拷贝】'), `body`, UNIX_TIMESTAMP(now()), `description`, `keywords`,  0, 0, 0, `added_by`, `importance`, `thumbnail`, UNIX_TIMESTAMP(now()), `categoryid`, `summary`  FROM `cases` WHERE id = ? ");
            $query->bindValue(1,$id);
            $query->execute();

            $result = $query->rowCount();;
            if ($result>0) {
                $msg = array ('status'=>1,'message'=>'记录已成功拷贝。');
                return json_encode($msg);  
            } else {
                $msg = array ('status'=>3,'message'=>'未拷贝记录。');
                return json_encode($msg);              
            }
        }


        //获取总数
        public function case_count()
        {
            $query = \db::getInstance()->prepare("SELECT count(*) as count FROM `cases`");
            $query->execute();
            $rows = $query->fetchColumn();
            return $rows;
        }

        //更新
        public function update_case($id, $title, $categoryid, $thumbnail, $body, $summary, $importance, $pubdate, $keywords, $description, $active, $recommend)
        {

            $sql = "UPDATE cases SET title= :title,
           categoryid =:categoryid,
           thumbnail =:thumbnail,    
           body = :body,
           summary = :summary,
           importance = :importance,
           pubdate = :pubdate,
           keywords = :keywords,
            description = :description,
            active =:active,
            recommend = :recommend
             WHERE id =:id";

            $date = new \DateTime($pubdate);
            $publish = $date->getTimestamp();

            $query = \db::getInstance()->prepare($sql);

            $query->bindValue(":title", $title);
            $query->bindValue(":categoryid", $categoryid, \PDO::PARAM_INT);
            $query->bindValue(":thumbnail", $thumbnail);
            $query->bindValue(":body", $body);
            $query->bindValue(":summary", $summary);
            $query->bindValue(":importance", $importance, \PDO::PARAM_INT);
            $query->bindValue(":pubdate", $publish, \PDO::PARAM_INT);
            $query->bindValue(":keywords", $keywords);
            $query->bindValue(":description", $description);
            $query->bindValue(":active", $active, \PDO::PARAM_BOOL);
            $query->bindValue(":recommend", $recommend, \PDO::PARAM_BOOL);
            $query->bindValue(":id", $id, \PDO::PARAM_INT);
            $query->execute();

            $result = $query->rowCount();;
            if ($result > 0) {
                $msg = array('status' => 1, 'message' => '记录已成功更新。');
                return json_encode($msg);
            } else {
                $msg = array('status' => 3, 'message' => '未更新记录。');
                return json_encode($msg);
            }
        }


        public function insert_case($title, $categoryid, $thumbnail,$body,$summary,$importance,$pubdate,$keywords,$description,$active,$recommend)
        {


            $sql = "INSERT INTO `cases`(`title`, `thumbnail`, `categoryid`,`body`,`summary`,`importance`, `pubdate`, `keywords`,`description`,`active`,`recommend`,`added_by`,`added_date`) 
        VALUES (:title,:thumbnail, :categoryid, :body, :summary, :importance,:pubdate,:keywords,:description,:active,:recommend, :added_by,:added_date)";

            $username = $_SESSION['valid_user'];
            $date = new DateTime($pubdate);
            $publish = $date->getTimestamp();

            $query = \ddb::getInstance()->prepare($sql);
            $query->bindValue(":title", $title);
            $query->bindValue(":categoryid", $categoryid, \PDO::PARAM_INT);
            $query->bindValue(":thumbnail", $thumbnail);
            $query->bindValue(":body", $body);
            $query->bindValue(":summary", $summary);
            $query->bindValue(":importance", $importance, \PDO::PARAM_INT);
            $query->bindValue(":pubdate", $publish, \PDO::PARAM_INT);
            $query->bindValue(":keywords", $keywords);
            $query->bindValue(":description", $description);
            $query->bindValue(":active", $active, \PDO::PARAM_BOOL);
            $query->bindValue(":recommend", $recommend, \PDO::PARAM_BOOL);
            $query->bindValue(":added_by", $username);
            $query->bindValue(":added_date", time(), \PDO::PARAM_INT);
            $query->execute();

            $result = $query->rowCount();;
            if ($result > 0) {
                $msg = array('status' => 1, 'message' => '新记录已成功创建。');
                return json_encode($msg);
            } else {
                $msg = array('status' => 3, 'message' => '未创建新记录。');
                return json_encode($msg);
            }
        }
    }
}
