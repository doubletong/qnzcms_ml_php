<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

use Models\Resource;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['key'],$_POST['lang_code'], $_POST['value'])) {   
                $result = array ('status'=>2,'message'=>'键或值不能为空！');
                echo json_encode($result);  
                return;
            }
            
          
            $item = new Resource();
            $item->lang_code = $_POST['lang_code'];
            $item->key = $_POST['key'];
            $item->value = $_POST['value'];
            $item->added_by = $username;
          
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['key'],$_POST['lang_code'], $_POST['value'])) {   
                $result = array ('status'=>2,'message'=>'键或值不能为空！');
                echo json_encode($result);  
                return;
            }
                      
        
            $item = Resource::find($id);
            $item->lang_code = $_POST['lang_code'];
            $item->key = $_POST['key'];
            $item->value = $_POST['value'];
            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Resource::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        
      
        case "check_key":
           
                $key=$_POST['key'];
                $lang=$_POST['lang_code'];   

                $query = Resource::where('key', $key)->where('lang_code',$lang);
                if($id>0){
                    $query = $query->where('id','!=', $id);
                }
              
                echo $query->count();                
           
            break;
        
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
