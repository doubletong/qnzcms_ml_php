<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
// require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Download;
use Rakit\Validation\Validator;

$validator = new Validator();

if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create":            

            // make it
            $validation = $validator->make($_POST + $_FILES, [
                'title'                => 'required',
                'lang'                 => 'required',   
                'file_url'             => 'required',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'title:required' => '请输入主题',
                'file_url:required'  => '请上传文档',
                'lang:required' => '请选择语言',
                'importance:required' => '请输入序号',
            ]);

            // then validate
            $validation->validate();

            if ($validation->fails()) {
                // handling errors
                $errors = $validation->errors();

                $result = array ('status'=>2,'message'=>$errors->all('<li>:message</li>'));
                echo json_encode($result);  
                exit;
            } 
            
          
            $item = new Download();
            $item->title = $_POST['title'];
            $item->lang = $_POST['lang'];
            $item->description = $_POST['description'];
            $item->file_url = $_POST['file_url'];
            $item->content = stripslashes($_POST['content']);
            $item->category_id = stripslashes($_POST['category_id']);
            $item->thumbnail = $_POST['thumbnail'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;


            $item->file_size = 0;
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$_POST['file_url'])){
                $item->file_size = filesize($_SERVER['DOCUMENT_ROOT'].$_POST['file_url']);               
            }

     
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            
            // make it
            $validation = $validator->make($_POST + $_FILES, [
                'title'                => 'required',
                'lang'                 => 'required',   
                'file_url'             => 'required',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'title:required' => '请输入主题',
                'file_url:required'  => '请上传文档',
                'lang:required' => '请选择语言',
                'importance:required' => '请输入序号',
            ]);

            // then validate
            $validation->validate();

            if ($validation->fails()) {
                // handling errors
                $errors = $validation->errors();

                $result = array ('status'=>2,'message'=>$errors->all('<li>:message</li>'));
                echo json_encode($result);  
                exit;
            } 
            
          
        
            $item = Download::find($id);
            $item->title = $_POST['title'];
            $item->lang = $_POST['lang'];
            $item->description = $_POST['description'];
            $item->file_url = $_POST['file_url'];
            $item->content = stripslashes($_POST['content']);
            $item->category_id = stripslashes($_POST['category_id']);
            $item->thumbnail = $_POST['thumbnail'];
            $item->importance = $_POST['importance'];
            $item->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";       
            $item->added_by = $username;

            $item->file_size = 0;
            if (file_exists($_SERVER['DOCUMENT_ROOT'].$_POST['file_url'])){
                $item->file_size = filesize($_SERVER['DOCUMENT_ROOT'].$_POST['file_url']);               
            }
     
            
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
         
            break;   
        case "delete": 
            $item = Download::find($id);
            $result = $item->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $item = Download::find($id);
            $item->active = ($item->active)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $item = Download::find($id);
            $item->recommend = ($item->recommend)==1?0:1;
            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Download::find($id);
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





