<?php
class Subscription{
    public function insert_email($email) {
        $sql="INSERT INTO subscriptions(email,added_date) VALUES (:email,:added_date)";
    
                $query = db::getInstance()->prepare($sql);
                $query->bindValue(":email",$email);       
                $query->bindValue(":added_date",time());                
                $query->execute();

                $result = $query->rowCount();;
                if ($result>0) {
                    return true;
                } else {
                    return false;
                }
            }

           
    public function check_email($email){      
            $query = db::getInstance()->prepare("SELECT count(*) as count FROM `subscriptions` WHERE email = :email");           
            $query->bindValue(":email",$email); 
            $query->execute();        
            $rows = $query->fetchColumn(); 
            if($rows>0){
               return  true;
            } 
            return false;
    }
}
?>