<?php
require_once('../../includes/common.php');
require_once('../../data/page.php');

$pageClass = new TZGCMS\Admin\Page();

if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];

    switch ($_POST['action']) {
        case "delete": 
            echo $pageClass->delete_page($id);    
            break;   
        case "active":
            echo $pageClass->active_page($id);  
            break;
        case "create": 
            if (isset($_POST['title'], $_POST['content'])) {
                $pageId = $_POST['id'];
                $title = $_POST['title'];
                $alias = $_POST['alias'];   
                $keywords = $_POST['keywords'];
                $description = $_POST['description'];
                $content = stripslashes($_POST['content']);
                $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
                $background_image = $_POST['background_image'];
                $importance = $_POST['importance'];
                //   echo $content.$productId;  
                echo $pageClass->insert_page($title, $alias, $importance, $keywords, $active, $description, $content,$background_image);
              
            
            }else{
                $result = array ('status'=>2,'message'=>'标题或内容不能为空');
                echo json_encode($result);  
            }
            break;
        case "update": 
            if (isset($_POST['title'], $_POST['content'])) {
                $pageId = $_POST['id'];
                $title = $_POST['title'];
                $alias = $_POST['alias'];   
                $keywords = $_POST['keywords'];
                $description = $_POST['description'];
                $content = stripslashes($_POST['content']);
                $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";
                $background_image = $_POST['background_image'];
                $importance = $_POST['importance'];
                //   echo $content.$productId;
        
               
                echo $pageClass->update_page($pageId, $title,$alias,$importance, $keywords, $active, $description, $content,$background_image);
               
            
            }else{
                $result = array ('status'=>2,'message'=>'标题或内容不能为空');
                echo json_encode($result);  
            }
            break;

    }
    

}else{
    $result = array ('status'=>2,'message'=>'未传递Id或操作命令');
    echo json_encode($result);  
}
