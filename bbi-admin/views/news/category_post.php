<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

use Models\NewsCategory;
use Models\News;
use Models\Language;

if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 

            $langs = Language::where('active',1)->orderby('importance','DESC')->get();

            $items = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $items[$lang]  =  $_POST['title_'.$lang];    
            }

            if (!isset($items, $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题不能为空！');
                echo json_encode($result);  
                return;
            }

           
                     
            $title = $items;
            $importance = $_POST['importance'];
            $parent = isset($_POST['parent']) && $_POST['parent']?$_POST['parent']:null;
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $region = new NewsCategory();
            $region->title = json_encode($title);
            $region->parent = $parent;
            $region->importance = $importance;
            $region->active = $active;
            $region->added_by = $username;

            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 

            $langs = Language::where('active',1)->orderby('importance','DESC')->get();

            $items = array();
            foreach($langs as $item){
                $lang = $item->code;            
                $items[$lang]  =  $_POST['title_'.$lang];    
            }

            if (!isset($items, $_POST['importance'])) {   
                $result = array ('status'=>2,'message'=>'主题不能为空！');
                echo json_encode($result);  
                return;
            }

          
            $title =  $items;
            $importance = $_POST['importance'];
            $parent = isset($_POST['parent']) && $_POST['parent']?$_POST['parent']:null;
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";


            $region = NewsCategory::find($id);
            $region->title = json_encode($title);
            $region->parent = $parent;
            $region->importance = $importance;
            $region->active = $active;
            $region->added_by = $username;

            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $region = NewsCategory::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;  
        case "exist": 
            $newsCount = News::where('category_id',$id)->count();            
            if($newsCount==0){
                echo json_encode(array ('status'=>1,'message'=>''));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'此分类下还存在新闻，是否确定删除？'));  
            }   
            break;   
        case "active":
            $region = NewsCategory::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        // // case "recommend":
        // //     echo $distributorClass->recommend_distributor($id);  
        // //     break;
        // case "copy":
        //     echo $distributorClass->copy_distributor($id);  
        //     break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}



