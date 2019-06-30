<?php
class Product{
    public function get_parent_categories($count){
        $query = db::getInstance()->prepare("SELECT * FROM product_categories WHERE active=1 AND parent_id=0 ORDER BY importance DESC LIMIT $count");
        $query->execute();

        return $query->fetchAll();
    }



    public function get_category_bgId($id){
        $query = db::getInstance()->prepare("SELECT * FROM product_categories WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function get_sub_categories($cid){
        $query = db::getInstance()->prepare("SELECT * FROM product_categories WHERE active=1 AND parent_id=$cid ORDER BY importance DESC");
        $query->execute();
        return $query->fetchAll();
    }

    public function get_products_byBigCateId($cid){
        $query = db::getInstance()->prepare("SELECT * FROM products WHERE active=1 AND category_id in (SELECT id FROM product_categories WHERE active=1 AND parent_id=$cid) ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }

    public function get_products_bycategory($ids){
        $query = db::getInstance()->prepare("SELECT * FROM products WHERE active=1 AND id in ($ids) ORDER BY importance DESC LIMIT 3");
        $query->execute();

        return $query->fetchAll();
    }

    public function get_product_bgId($id){
        $query = db::getInstance()->prepare("SELECT * FROM products WHERE id = ?");
        $query->bindValue(1,$id);
        $query->execute();

        return $query->fetch();
    }

    public function get_product_documents($pid){
        $query = db::getInstance()->prepare("SELECT * FROM product_documents WHERE product_id = ? ORDER BY importance DESC");   
        $query->bindValue(1,$pid);  
        $query->execute();
        return $query->fetchAll();
    }

    public function hot_products(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE active=1  ORDER BY view_count DESC limit 5");
        $query->execute();
        return $query->fetchAll();
    }

    public function recommendProducts(){
        $query = db::getInstance()->prepare("SELECT * FROM wp_products WHERE active=1 AND recommend = 1 ORDER BY importance DESC");
        $query->execute();

        return $query->fetchAll();
    }


}