<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\DownloadCategory;
use Models\Download;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
            
          
            $item = new DownloadCategory();
            $item->title = $_POST['title'];
            $item->description = $_POST['description'];       
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;

     
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
          
        
            $item = DownloadCategory::find($id);
            $item->title = $_POST['title'];
            $item->description = $_POST['description'];           
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = DownloadCategory::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = DownloadCategory::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $item = DownloadCategory::find($id);
            $item->recommend = ($item->recommend)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = DownloadCategory::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->title = $new_item->title."【拷贝】";
            $result = $new_item->push(); //save model before you recreate relations (so it has an id)
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'拷贝成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'拷贝失败'));  
            }   
            break;
        case "exist": 
            $downloadCount = Download::where('category_id',$id)->count();            
            if($downloadCount==0){
                echo json_encode(array ('status'=>1,'message'=>''));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'此分类下还存在下载文档，是否确定删除？'));  
            }   
            break;   
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}





