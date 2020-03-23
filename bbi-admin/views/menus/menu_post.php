
<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/Utils/Enum.php');

use Models\Menu;


if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = Menu::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
    
        case "create": 
            if (!isset($_POST['title'], $_POST['importance'])) {   

                $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
                echo json_encode($result);  
                return;
            }
                    
            if(isset($_POST['url'])){
                $seotitle = $_POST['seotitle'];
                $seokeywords = $_POST['seokeywords'];
                $seodescription = $_POST['seodescription'];
              
    
                $module = ModuleType::URL();
                $url = $_POST['url'];
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }                 


            $item = new Menu();
            $item->title = $_POST['title'];
            $item->description = isset($_POST['description']) ? $_POST['description']:"";
            $item->url = $_POST['url'];
            $item->icon = $_POST['icon'];
            $item->group_id =  $_POST['group_id'];
            $item->importance = $_POST['importance']; 
            $item->parent = isset($_POST['parent'])?$_POST['parent']:0; 
            $item->new_window = isset($_POST['new_window']) && $_POST['new_window']  ? "1" : "0";
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

                $result = array ('status'=>2,'message'=>'主题与排序不能为空！');
                echo json_encode($result);  
                return;
            }
                        
                 
            if(isset($_POST['url'])){
                $seotitle = $_POST['seotitle'];
                $seokeywords = $_POST['seokeywords'];
                $seodescription = $_POST['seodescription'];
              
    
                $module = ModuleType::URL();
                $url = $_POST['url'];
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }                 


            $item = Menu::find($id);
            $item->title = $_POST['title'];
            $item->description = isset($_POST['description']) ? $_POST['description']:"";
            $item->url = $_POST['url'];
            $item->icon = $_POST['icon'];
            $item->group_id =  $_POST['group_id'];
            $item->importance = $_POST['importance']; 
            $item->parent = isset($_POST['parent'])?$_POST['parent']:0; 
            $item->new_window = isset($_POST['new_window']) && $_POST['new_window']  ? "1" : "0";
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
            

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = Menu::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "checkcode":
            if(isset($_POST['id'],$_POST['alias'])){
                $id=$_POST['id'];
                $alias=$_POST['alias'];
                echo Menu::where('alias', $alias)
                ->where('id','<>', $id)
                ->count();
                
            }else{
                echo 0;
            }
            break;
        }
    

}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}



