<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Business;
use Rakit\Validation\Validator;

$validator = new Validator();

if( isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "create":       

            // make it
            $validation = $validator->make($_POST + $_FILES, [
                'title'                => 'required|max:100',
                'lang'                 => 'required',
                'content'              => 'required',
                'category_id'          => 'required',                    
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'

            ]);

            $validation->setMessages([
                'title:required' => '请输入主题',
                'title:max' => '主题长度不可超过100字符', 
                'content:required' => '请输入内容',            
                'lang:required' => '请选择语言',
                'category_id:required' => '请选择行业分类',
                'importance:required' => '请输入序号',
                'importance:numeric' => '输入格式不正确',
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

            
            $news = new Business();
            $news->lang = $_POST['lang'];
            $news->title = $_POST['title'];
            $news->category_id = $_POST['category_id'];
            $news->content = stripslashes($_POST['content']); 
  
            $news->importance = $_POST['importance'];
            $news->image_url = $_POST['image_url'];

            $news->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $news->added_by = $username;


            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'创建成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'创建失败'));  
            }   

            break;   
        case "update": 
            // make it
            $validation = $validator->make($_POST + $_FILES, [
                'title'                => 'required|max:100',
                'lang'                 => 'required',
                'content'              => 'required',
                'category_id'          => 'required',                    
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'

            ]);

            $validation->setMessages([
                'title:required' => '请输入主题',
                'title:max' => '主题长度不可超过100字符', 
                'content:required' => '请输入内容',            
                'lang:required' => '请选择语言',
                'category_id:required' => '请选择行业分类',
                'importance:required' => '请输入序号',
                'importance:numeric' => '输入格式不正确',
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

          
            $news = Business::find($id);
            $news->title = $_POST['title'];
            $news->lang = $_POST['lang'];
            $news->category_id = $_POST['category_id'];
            $news->content = stripslashes($_POST['content']);   
            $news->importance = $_POST['importance'];
            $news->image_url = $_POST['image_url'];          
            $news->active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $result = $news->save();

            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));                  

            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   
            // $result = array ('status'=>1,'message'=>'更新成功');
            // echo json_encode($result);  
            break;   
        case "delete": 
            $news = Business::find($id);
            $result = $news->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
        case "active":
            $news = Business::find($id);
            $news->active = ($news->active)==1?"0":1;
            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "recommend":
            $news = Business::find($id);
            $news->recommend = ($news->recommend)==1?"0":1;
            $result = $news->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'操作成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'操作失败'));  
            }   
            break;
        case "copy":
            $item = Business::find($id);
            $new_item = $item->replicate(); //copy attributes
            $new_item->title = $new_item->title."【拷贝】";
            $new_item->active = 0;
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



