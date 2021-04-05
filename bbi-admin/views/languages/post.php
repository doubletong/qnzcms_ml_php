<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');

use Models\Language;


if( isset($_POST['action']) && isset($_POST['code'])){

    $id=$_POST['code'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['code'], $_POST['name'])) {   

                $result = array ('status'=>2,'message'=>'语言代码与名称不能为空！');
                echo json_encode($result);  
                return;
            }
            
          
            $item = new Language();
            $item->code = $_POST['code'];
            $item->name = $_POST['name'];
            $item->show_label = $_POST['show_label'];
            $item->importance = $_POST['importance'];
            $item->issys = "0";       
            $item->default = isset($_POST['default']) && $_POST['default']  ? 1 : 0;       
            $item->active = isset($_POST['active']) && $_POST['active']  ? 1 : 0;     
            if($item->default == 1){
                Language::where('default',1)->update(['default' => 0]);
            }      

     
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            if (!isset($_POST['code'], $_POST['name'])) {   

                $result = array ('status'=>2,'message'=>'语言代码与名称不能为空！');
                echo json_encode($result);  
                return;
            }
                      
        
            $code = $_POST['code'];
            $item = Language::find($code);
            $item->code = $code;
            $item->name = $_POST['name'];
            $item->show_label = $_POST['show_label'];
            $item->importance = $_POST['importance'];   
            $item->default = isset($_POST['default']) && $_POST['default']  ? "1" : "0";       
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
    
            if($item->default == 1){
                Language::where('default',1)->where('code','!=',$code)->update(['default' => 0]);
            }

            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Language::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Language::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "default":
            $item = Language::find($id);
            $item->default = ($item->default)==1?0:1;

            if($item->default == 1){
                Language::where('default',1)->where('code','!=',$id)->update(['default' => 0]);
            }

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        
    }
    
}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
