<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\News;


if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create": 
            if (!isset($_POST['title'], $_POST['content'])) {   

                $result = array ('status'=>2,'message'=>'主题与内容不能为空！');
                echo json_encode($result);  
                return;
            }
            
            $news = new News();
            $news->lang = $_POST['lang'];
            $news->title = $_POST['title'];
            $news->category_id = $_POST['category_id'];
            $news->content = stripslashes($_POST['content']);
            $news->summary = $_POST['summary'];
            $news->author = $_POST['author'];
            $news->author_ext = isset($_POST['authorExt']) ? implode("|",$_POST['authorExt']):null;
            $news->pubdate = $_POST['pubdate'];
            $news->importance = $_POST['importance'];
            $news->thumbnail = $_POST['thumbnail'];
            $news->recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
            $news->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $news->added_by = $username;

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
          

            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  

                $module = ModuleType::NEWS();
                $url = $news->id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);

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

          
            $news = News::find($id);
            $news->title = $_POST['title'];
            $news->lang = $_POST['lang'];
            $news->category_id = $_POST['category_id'];
            $news->content = stripslashes($_POST['content']);
            $news->summary = $_POST['summary'];
            $news->author = $_POST['author'];
            $news->author_ext = isset($_POST['authorExt']) ? implode("|",$_POST['authorExt']):null;
            $news->pubdate = $_POST['pubdate'];
            $news->importance = $_POST['importance'];
            $news->thumbnail = $_POST['thumbnail'];
            $news->recommend = isset($_POST['recommend']) && $_POST['recommend']  ? "1" : "0";
            $news->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $seotitle = $_POST['seotitle'];
            $seokeywords = $_POST['seokeywords'];
            $seodescription = $_POST['seodescription'];
            

           

            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
                $module = ModuleType::NEWS();
                $url = $news->id;
                metadataSave($seotitle,$seokeywords,$seodescription,$module,$url);

            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $news = News::find($id);
            $result = $news->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $news = News::find($id);
            $news->active = ($news->active)==1?"0":1;
            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $news = News::find($id);
            $news->recommend = ($news->recommend)==1?"0":1;
            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = News::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->title = $new_item->title."【拷贝】";
            $result = $new_item->push(); //save model before you recreate relations (so it has an id)
            if($result==true){
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



