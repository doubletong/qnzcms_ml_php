<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');
use Models\Role;
use Models\PermissionRole;

if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['name'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
            
          
            $item = new Role();
            $item->name = $_POST['name'];
            $item->description = $_POST['description'];       
            $item->importance = $_POST['importance'];
            // $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;

     
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['name'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
          
        
            $item = Role::find($id);
            $item->name = $_POST['name'];
            $item->description = $_POST['description'];           
            $item->importance = $_POST['importance'];
            // $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Role::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Role::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
      
        case "setPermissions":
            $item = Role::find($id);
            
            //print_r($_POST['per_id']);
            $per_ids = $_POST['per_id'];
            //print_r($per_ids);
            $old = PermissionRole::where('role_id',$id)->whereNotIn('permission_id',$per_ids)->delete();
            //print_r($old);

            foreach($per_ids as $per_id){
                $role_per = PermissionRole::where('role_id','$id')->where('permission_id',$per_id)->count();
                if($role_per==0){
                    $item = New PermissionRole();
                    $item->role_id = $id;
                    $item->permission_id = $per_id; 
                    $item->save();      
                }
            }

            echo json_encode(array ('status'=>1,'message'=>'权限设置成功'));  
           
            // if($result==true){
            //     echo json_encode(array ('status'=>1,'message'=>'拷贝成功'));  
            // }else{
            //     echo json_encode(array ('status'=>2,'message'=>'拷贝失败'));  
            // }   
            break;
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}





