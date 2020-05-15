<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Models\Job;

CacheManager::setDefaultConfig(new ConfigurationOption([
    'path' => $_SERVER['DOCUMENT_ROOT'].'/assets/caches/tmp',    // 缓存路径 or in windows "C:/tmp/"
]));

$InstanceCache = CacheManager::getInstance('files');


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['responsibilities'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
            
          
            $item = new Job();
            $item->title = $_POST['title'];
            $item->city = $_POST['city'];
            $item->department = $_POST['department'];
            $item->responsibilities = stripslashes($_POST['responsibilities']);
            $item->requirement = stripslashes($_POST['requirement']);
            $item->population = $_POST['population'];
            $item->summary = $_POST['summary'];
            $item->author = $_POST['author'];
            $item->pubdate = $_POST['pubdate'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;

     
            $result = $item->save();
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['title'], $_POST['responsibilities'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
          
        
            $item = Job::find($id);
            $item->title = $_POST['title'];
            $item->city = $_POST['city'];
            $item->department = $_POST['department'];
            $item->responsibilities = stripslashes($_POST['responsibilities']);
            $item->requirement = stripslashes($_POST['requirement']);
            $item->population = $_POST['population'];
            $item->summary = $_POST['summary'];
            $item->author = $_POST['author'];
            $item->pubdate = $_POST['pubdate'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            
            $result = $item->save();
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Job::find($id);
            $result = $item->delete();
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Job::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $item = Job::find($id);
            $item->recommend = ($item->recommend)==1?0:1;
            $result = $item->save();
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Job::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->title = $new_item->title."【拷贝】";
            $result = $new_item->push(); //save model before you recreate relations (so it has an id)
            if($result==true){
                $InstanceCache->clear();
                echo json_encode(array ('status'=>1,'message'=>'拷贝成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'拷贝失败'));  
            }   
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}





