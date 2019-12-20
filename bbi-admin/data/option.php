<?php
namespace TZGCMS\Admin{
    class SiteOption{
        public function get_config($name){     
            $query = \db::getInstance()->prepare("SELECT * FROM  options WHERE config_name = ?");
            $query->bindValue(1,$name);
            $query->execute();
            return $query->fetch();
        }

        
    //更新
    public function update_config( $config_name,$config_values) {

            $sql = "UPDATE `options` SET
            config_values= :config_values
            WHERE config_name =:config_name";

            $json = json_encode($config_values);

            $query = \db::getInstance()->prepare($sql);

            $query->bindValue(":config_name",$config_name);
            $query->bindValue(":config_values",$json);      
        
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


        public function insert_config($config_name,$config_values) {

        
            $sql="INSERT INTO `options`(`config_name`, `config_values`,`added_by` ,`added_date`) 
            VALUES (:config_name,:config_values, :added_by , :added_date)";

            $username = $_SESSION['valid_user'] ;
            $json = json_encode($config_values);

            $query = \db::getInstance()->prepare($sql);
            $query->bindValue(":config_name",$config_name);
            $query->bindValue(":config_values",$json);      
            $query->bindValue(":added_by",$username);
            $query->bindValue(":added_date",time(),PDO::PARAM_INT);
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