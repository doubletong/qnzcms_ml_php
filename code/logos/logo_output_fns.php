<?php
require_once('../../code/admin/output_fns.php');



function display_logos($logo_array) {
	if (!is_array($logo_array)) {
		echo "<p class=\"info\">没有标志数据。</p>";
		return;
	}
	echo "<table class=\"tbllist\"><tr><th>序</th><th>主题</th><th>缩略图</th><th>发布者</th><th>日期</th><th></th></tr>";
	foreach ($logo_array as $row)  {
		$logo = $row['logoid'];
		$importance = $row['importance'];	
		$title = $row['title'];	
		$imgurl = $row['imgurl'];
		$addedby =$row['addedby'];
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);
		
		
		echo "<tr>";
		echo "<td>".$importance."</td>";
		echo "<td>$title</td><td>";	
	 if(empty($imgurl)){
	 	echo "<a class=\"upload\" href=\"upload_logo_form.php?logoid=$logo\">上传图片</a>";
	 	
	 }else{	 		 	
		echo "<img src=\"showimg.php?imgurl=../../static/uploads/logo/".$imgurl."\" alt=\"$title\" />";
	 }
		echo "</td><td>".$addedby."</td>";
		echo "<td>".$addedDate."</td>";
		
		echo "<td><a class=\"edit\" href=\"edit_logo_form.php?logoid=".$logo."\">编辑</a></td>";

		echo "</tr>";
	}
	echo "</table>";

}



// 显示标志编辑表单.
function display_logo_form($logo = '') {

	// if passed an existing logo, proceed in "edit mode"
	$edit = is_array($logo);

	// most of the form is in plain HTML with some
	// optional PHP bits throughout
	?>
<fieldset>
<legend><?php echo $edit ? '更新标志' : '添加标志'; ?></legend>


  <form method="post"
      action="<?php echo $edit ? 'edit_logo.php' : 'insert_logo.php'; ?>">
 <p>
    <label>主题：</label><input type="text" name="title" size="40" maxlength="50" class="inputext"
          value="<?php echo $edit ? $logo['title'] : ''; ?>" />
   </p>
   <p>
    <label>排序：</label>
    <input type="text" name="importance" size="3" maxlength="4" class="inputext"
          value="<?php echo $edit ? $logo['importance'] : '0'; ?>" />
   </p>
  <p>
    
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"logoid\" value=\"".$logo['logoid']."\" />";
         }
      ?>
      <input type="submit" class="btnstyle"
       value="<?php echo $edit ? '更新' : '添加'; ?>标志" />
     </p>
     </form>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo " <form method=\"post\" action=\"delete_logo.php\">
                <input type=\"hidden\" name=\"logoid\" value=\"".$logo['logoid']."\" />
                
			<p><input type=\"submit\" class=\"btnstyle\" value=\"删除标志\" /></p>
                </form>";
       }
     ?>

  
  </fieldset>
<?php
}


// 显示产品编辑表单.
function display_upload_logo_form() {

	?>
<fieldset>
<legend>上传图片</legend>
<form action="upload_logo.php?logoid=<?php echo $_GET['logoid'] ?>" method="post" enctype="multipart/form-data">

<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<p>
<label for="userfile">选择图片:</label>
<input type="file" name="userfile" id="userfile"/>
<input type="submit" class="btnstyle" value="上传"/>
</p>
</form>
</fieldset>
<?php

}

?>