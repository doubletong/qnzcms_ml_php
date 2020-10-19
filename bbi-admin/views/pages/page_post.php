<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Page;


if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = Page::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
    
        case "create": 
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
          
            $title = $_POST['title'];
            $lang = $_POST['lang'];   
            $content = stripslashes($_POST['content']);        
            $alias = $_POST['alias'];   
            $importance = $_POST['importance'];
            $background_image = $_POST['background_image'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
          

            $item = new Page();
            $item->title = $title;
            $item->lang = $lang;
            $item->content = $content;
            $item->alias = $alias;
            $item->importance = $importance;            
            $item->background_image = $background_image;
            $item->active = $active;
            $item->added_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
                $module = ModuleType::URL();
                $url = $alias.'_'.$lang;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

           
            break;
        case "update":           
            
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
                        
            $title = $_POST['title'];
            $lang = $_POST['lang'];   
            $content = stripslashes($_POST['content']);        
            $alias = $_POST['alias'];   
            $importance = $_POST['importance'];
            $background_image = $_POST['background_image'];
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
            

          
            $item = Page::find($id);
            $item->title = $title;       
            $item->lang = $lang;   
            $item->content = $content;
            $item->alias = $alias;
            $item->importance = $importance;            
            $item->background_image = $background_image;
            $item->active = $active;
            $item->added_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
                $module = ModuleType::URL();
                $url = $alias.'_'.$lang;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = Page::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "checkcode":
            if(isset($_POST['id'],$_POST['lang'],$_POST['alias'])){
                $id=$_POST['id'];
                $lang=$_POST['lang'];
                $alias=$_POST['alias'];
                echo Page::where('alias', $alias)
                ->where('lang', $lang)
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
