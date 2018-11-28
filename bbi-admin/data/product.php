<?php
class Product{
    public function fetch_all(){
        global $dbh;
        $query = $dbh->prepare("SELECT * FROM wp_products ORDER BY added_date DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function fetch_data($id){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function delete_product($id){
        $query = db::getInstance()->prepare("DELETE FROM `wp_products` WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

//更新产品
   public function update_product($id, $product_no, $title,$sub_title,$slogan,$price,$link,$importance,$thumbnail,$background,$keywords,$recommend,$active,$summary, $description, $content, $brand,$category,$company) {

        $sql = "update wp_products
             set product_no= :product_no,
             title= :title,
             sub_title = :sub_title,
             summary = :summary,
             description = :description,
             content = :content,
             slogan = :slogan,
             price = :price,
             link = :link,
             importance = :importance,
             thumbnail =:thumbnail,
             background = :background,
             keywords = :keywords,
             recommend = :recommend,
             brand = :brand,
             category = :category,
             company = :company,
             active =:active
             where id =:id";

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":product_no",$product_no);
        $query->bindValue(":title",$title);
        $query->bindValue(":sub_title",$sub_title);
       $query->bindValue(":summary",$summary);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":slogan",$slogan);
       $query->bindValue(":price",$price);
       $query->bindValue(":link",$link);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":background",$background);
        $query->bindValue(":keywords",$keywords);
       $query->bindValue(":brand",$brand);
       $query->bindValue(":category",$category);
       $query->bindValue(":company",$company);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":recommend",$recommend,PDO::PARAM_BOOL);
        $query->bindValue(":id",$id,PDO::PARAM_INT);
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_product($product_no, $title,$sub_title,$slogan,$price,$link,$importance,$thumbnail,
                                   $background,$keywords,$recommend,$active,$summary, $description, $content, $brand,$category,$company) {

        $sql="INSERT INTO wp_products ( product_no,title,sub_title, summary, description,content, slogan,price,link,importance,thumbnail,background,keywords,recommend,active,added_by,added_date,brand,category,company)
                VALUES (:product_no,:title,:sub_title,:summary, :description,:content, :slogan,:price,:link,:importance,:thumbnail,:background,:keywords,:recommend,:active,:added_by,:added_date,:brand,:category,:company)";

        $username = $_SESSION['valid_user'] ;

        $query = db::getInstance()->prepare($sql);
        $query->bindValue(":product_no",$product_no);
        $query->bindValue(":title",$title);
        $query->bindValue(":sub_title",$sub_title);
        $query->bindValue(":summary",$summary);
        $query->bindValue(":description",$description);
        $query->bindValue(":content",$content);
        $query->bindValue(":slogan",$slogan);
        $query->bindValue(":price",$price);
        $query->bindValue(":link",$link);
        $query->bindValue(":importance",$importance,PDO::PARAM_INT);
        $query->bindValue(":thumbnail",$thumbnail);
        $query->bindValue(":background",$background);
        $query->bindValue(":keywords",$keywords);
        $query->bindValue(":brand",$brand);
        $query->bindValue(":category",$category);
        $query->bindValue(":company",$company);
        $query->bindValue(":recommend",$recommend,PDO::PARAM_BOOL);
        $query->bindValue(":active",$active,PDO::PARAM_BOOL);
        $query->bindValue(":added_by",$username);
        $query->bindValue(":added_date",time());
        $query->execute();

        $result = $query->rowCount();;
        if ($result>0) {
            return true;
        } else {
            return false;
        }
    }

}