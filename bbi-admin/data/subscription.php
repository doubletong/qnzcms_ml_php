<?php
//邮件订阅
class Subscription{
    public function fetch_all(){    
        $query = db::getInstance()->prepare("SELECT * FROM subscriptions ORDER BY email ASC");
        $query->execute();

        return $query->fetchAll();
    }
    //导出
    public function export_mails(){    
        $query = db::getInstance()->prepare("SELECT * FROM subscriptions INTO OUTFILE 'emaillist.txt'");
        $query->execute();
        return $query->fetchAll();
    }


    //获取总数
    public function subscription_count(){
        $query = db::getInstance()->prepare("SELECT count(*) as count FROM `subscriptions`");    
        $query->execute();        
        $rows = $query->fetchColumn(); 
        return $rows;
    }

    public function delete_subscription($email){
        $query = db::getInstance()->prepare("DELETE FROM `subscriptions` WHERE email = ?");
        $query->bindValue(1,$email);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}