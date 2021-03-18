<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Chronicle;
use Rakit\Validation\Validator;

$validator = new Validator();

if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = Chronicle::find($id);
            $result = $region->delete();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'删除成功'));  
            }else{
                echo json_encode(array ('status'=>2,'message'=>'删除失败'));  
            }   
            break;   
    
        case "create": 
          
           
            // make it
            $validation = $validator->make($_POST + $_FILES, [
                'year'                 => 'required|numeric',
                'lang'                 => 'required',   
                'content'              => 'required',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'year:required' => '请输入年份',                
                'year:numeric'  => '请输入有效的年份',
                'lang:required' => '请选择语言',
                'content:required' => '请输入内容',
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

                     
            $year = $_POST['year'];
            $content = stripslashes($_POST['content']);
            $importance = $_POST['importance'];   
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

    
            $item = new Chronicle();
            $item->year = $year;
            $item->lang = $_POST['lang'];
            $item->content = $content; 
            $item->importance = $importance;
            $item->active = $active;
            $item->created_by = $username;

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
                'year'                 => 'required|numeric',
                'lang'                 => 'required',   
                'content'              => 'required',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'year:required' => '请输入年份',
                'year:numeric'  => '请输入有效的年份',
                'lang:required' => '请选择语言',
                'content:required' => '请输入内容',
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
                        
            $year = $_POST['year'];
            $content = stripslashes($_POST['content']); 
            $importance = $_POST['importance']; 
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";


            $item = Chronicle::find($id);
            $item->year = $year;
            $item->lang = $_POST['lang'];
            $item->content = $content;      
            $item->importance = $importance;     
            $item->active = $active;
            $item->created_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
             
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = Chronicle::find($id);
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
                echo Chronicle::where('alias', $alias)
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
