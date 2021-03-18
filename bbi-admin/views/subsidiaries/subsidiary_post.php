<?php
require_once('../../includes/common.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/app/utils/enum.php');

use Models\Subsidiary;
use Rakit\Validation\Validator;

$validator = new Validator();

if(isset($_POST['action']) && isset($_POST['id'])){

    $id=$_POST['id'];
    $username = $_SESSION['valid_user'] ;

    switch ($_POST['action']) {
        case "delete": 
            $region = Subsidiary::find($id);
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
                'name'                 => 'required',
                'lang'                 => 'required',
                'category_id'          => 'required',   
                'stock_code'           => 'max:8',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'name:required' => '请输入公司名称',
                'stock_code:max' => '股票代码格式不正确',             
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

         
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0";

            $item = new Subsidiary();
            $item->name = $_POST['name'];
            $item->lang = $_POST['lang'];
            $item->stock_code = $_POST['stock_code'];   
            $item->category_id = $_POST['category_id'];   
            $item->importance = $_POST['importance'];
            $item->logo_url = $_POST['logo_url'];
            $item->active = $active;
            $item->added_by = $username;

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
                'name'                 => 'required',
                'lang'                 => 'required',
                'category_id'          => 'required',   
                'stock_code'           => 'max:8',           
                'importance'           => 'required|numeric',             
                'active'               => 'default:1|required|in:0,1'
            
            ]);

            $validation->setMessages([
                'name:required' => '请输入公司名称',
                'stock_code:max' => '股票代码格式不正确',             
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

                        
            $active = isset($_POST['active']) && $_POST['active']  ? "1" : "0"; 

          
            $item = Subsidiary::find($id);
            $item->name = $_POST['name'];
            $item->lang = $_POST['lang'];
            $item->stock_code = $_POST['stock_code'];   
            $item->category_id = $_POST['category_id'];   
            $item->importance = $_POST['importance'];
            $item->logo_url = $_POST['logo_url'];
            $item->active = $active;
            $item->added_by = $username;

            $result = $item->save();
            if($result==true){
                echo json_encode(array ('status'=>1,'message'=>'更新成功'));                 
            }else{
                echo json_encode(array ('status'=>2,'message'=>'更新失败'));  
            }   

            break;
        case "active":
            $region = Subsidiary::find($id);
            $region->active = ($region->active)==1?"0":1;
            $result = $region->save();
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
