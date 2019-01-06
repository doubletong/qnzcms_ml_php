<?php
class Team{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM teams ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM teams WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_team($id){
        $query = db::getInstance()->prepare("DELETE FROM `teams` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

    
    //获取总数
    public function team_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `teams`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

//更新
   public function update_team($id, $name, $post, $photo, $content, $category,$importance) {

        $sql = "UPDATE teams SET name= :name,
           post =:post,
           photo =:photo,
           content = :content,
           category = :category,
           importance = :importance
         
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":name",$name);
        $query->bindValue(":post",$post);
        $query->bindValue(":photo",$photo);
        $query->bindValue(":content",$content);
        $query->bindValue(":category",$category);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_team($name, $post, $photo, $content, $category,$importance) {

        
        $sql="INSERT INTO `teams`(`name`, `post`, `photo`, `content`, `category`, `importance`, `added_by`,`added_date`) 
        VALUES (:name, :post, :photo, :content, :category, :importance, :added_by,:added_date)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":name",$name);
        $query->bindValue(":post",$post);
        $query->bindValue(":photo",$photo);
        $query->bindValue(":content",$content);
        $query->bindValue(":category",$category);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time(),PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}