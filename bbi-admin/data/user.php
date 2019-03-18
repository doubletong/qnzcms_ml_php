<?php
class User{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM wp_users ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_users WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_user($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_users` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }
//修改密码
public function update_pwd($id, $password) {

    $sql = "UPDATE wp_users SET 
       password =:password
         WHERE id =:id";

    $query = db::getInstance()->prepare($sql);

    $query->bindValue(":password",$password);
    $query->bindValue(":id",$id,PDO::PARAM_INT);
    $query->execute();

    $result = $query->rowCount();;
    if ($result>0) {
        return true;
    } else {
        return false;
    }
}

//更新
    public function update_user($id, $username, $password) {

        $sql = "UPDATE wp_users SET username= :username,
           password =:password
             WHERE id =:id";

        $query = db::getInstance()->prepare($sql);

        $query->bindValue(":username",$username);
        $query->bindValue(":password",$password);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

    public function insert_user($username, $password) {

        $sql="INSERT INTO wp_users (username,password,created_date)
                VALUES (:username,:password,:created_date)";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":username",$username);
        $query->bindValue(":password",$password);
        $query->bindValue(":created_date",date('Y-m-d H:i:s'));
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}