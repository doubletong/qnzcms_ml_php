<?php
//creative 提交表单
	if (isset($_FILES['file']['name'])) {
		if (0 < $_FILES['file']['error']) {
            $result = array ('status'=>2,'message'=>'文件上传时出错'. $_FILES['file']['error']);
            echo json_encode($result);
		
		} else {
		
                move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/emails/' . $_FILES['file']['name']);
                
                $result = array ('status'=>1,'message'=>'uploads/emails/'. $_FILES['file']['name']);
                echo json_encode($result);	
		}
	} else {
        $result = array ('status'=>2,'message'=>'请选择要发送的附件');
        echo json_encode($result);	
	}

?>