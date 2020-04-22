<?php 
if(isset($_POST['read_file']))
{
    $file_name=$_POST['file_path'];
    //$edit_file = fopen($file_name, 'w');
    //echo $file_name;
    echo file_get_contents($file_name);
    // fclose($edit_file);
}

if(isset($_POST['edit_file']))
{
    $file_name=$_POST['file_path'];
    $write_text=$_POST['file_content'];
   // $folder="files/";
   // $ext=".txt";
   // $file_name=$folder."".$file_name."".$ext;
    $edit_file = fopen($file_name, 'w');
        
    fwrite($edit_file, $write_text);
    fclose($edit_file);

    echo json_encode(array ('status'=>1,'message'=>'更新成功'));  
}

// if(isset($_POST['create_file']))
// {
//     $file_name=$_POST['file_name'];
//     $folder="files/";
//     $ext=".txt";
//     $file_name=$folder."".$file_name."".$ext;
//     $create_file = fopen($file_name, 'w');
//     fclose($create_file);
// }

?>
