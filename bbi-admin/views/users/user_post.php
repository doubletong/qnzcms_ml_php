<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/utils/enum.php');

use Models\User;


if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = User::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
    
        case "create": 
            if (!isset($_POST['username'], $_POST['password'])) {   

                $result = array ('status'=>2,'message'=>'用户名或密码不能为空！');
                echo json_encode($result);  
                return;
            }
                             
            $passwordhash = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 8]);

            $item = new User();
            $item->username = $_POST['username'];         
            $item->email = $_POST['email'];               
            $item->photo = $_POST['photo'];     
            $item->passwordhash = $passwordhash;
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
            
            if (!isset($_POST['username'])) {   

                $result = array ('status'=>2,'message'=>'用户名不能为空！');
                echo json_encode($result);  
                return;
            }
                       
        
            $item = User::find($id);         
            $item->email = $_POST['email'];               
            $item->photo = $_POST['photo'];       
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";           

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));                 
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = User::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;

      
        case "resetpassword":           
        
            if (!isset($_POST['password'])) {   

                $result = array ('status'=>2,'message'=>'密码不能为空！');
                echo json_encode($result);  
                return;
            }

            $passwordhash = password_hash($_POST['password'], PASSWORD_BCRYPT, ["cost" => 8]);       
        
            $item = User::find($id);         
            $item->passwordhash = $passwordhash;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));                 
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;

    
            
        
        }
    

}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
