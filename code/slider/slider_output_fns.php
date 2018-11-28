<?php
require_once('../../code/admin/output_fns.php');



function display_sliders($slider_array) {
	if (!is_array($slider_array)) {
		echo "<p class=\"info\">没有幻灯数据。</p>";
		return;
	}
	echo "<table class=\"tbllist\"><tr><th>序</th><th>主题</th><th>缩略图</th><th>发布者</th><th>日期</th><th></th></tr>";
	foreach ($slider_array as $row)  {
		$slider = $row['sliderid'];
		$importance = $row['importance'];	
		$title = $row['title'];
		$link = $row['link'];
		$imgurl = $row['imgurl'];
		$addedby =$row['addedby'];
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);
		
		
		echo "<tr>";
		echo "<td>".$importance."</td>";
		echo "<td><a href=\"$link\" >$title</a></td>";	
	 if(empty($imgurl)){
	 	echo "<td><a class=\"upload\" href=\"upload_slider_form.php?sliderid=$slider\">上传图片</a></td>";
	 }else{
	 		 	
		echo "<td><img src=\"showimg.php?imgurl=../../static/uploads/slider/".$imgurl."\" alt=\"$title\" /></td>";
	 }
		echo "<td>".$addedby."</td>";
		echo "<td>".$addedDate."</td>";
		
		echo "<td><a class=\"edit\" href=\"edit_slider_form.php?sliderid=".$slider."\">编辑</a></td>";

		echo "</tr>";
	}
	echo "</table>";

}



// 显示幻灯编辑表单.
function display_slider_form($slider = '') {

	// if passed an existing slider, proceed in "edit mode"
	$edit = is_array($slider);

	// most of the form is in plain HTML with some
	// optional PHP bits throughout
	?>
<fieldset>
<legend><?php echo $edit ? '更新幻灯' : '添加幻灯'; ?></legend>


  <form method="post"
      action="<?php echo $edit ? 'edit_slider.php' : 'insert_slider.php'; ?>">
 <p>
    <label>主题：</label><input type="text" name="title" size="40" maxlength="50" class="inputext"
          value="<?php echo $edit ? $slider['title'] : ''; ?>" />
   </p>
    <p>
    <label>描述：</label><textarea name="description"  class="input-xxlarge"
          ><?php echo $edit ? $slider['description'] : ''; ?></textarea>
   </p>
   <p>
   <label>链接：</label>
   <input type="text" name="link" size="40" maxlength="150" class="inputext" value="<?php echo $edit ? $slider['link'] : ''; ?>" />
   </p>
   <p>
    <label>排序：</label>
    <input type="text" name="importance" size="3" maxlength="4" class="inputext"
          value="<?php echo $edit ? $slider['importance'] : '0'; ?>" />
   </p>
  <p>
    
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"sliderid\" value=\"".$slider['sliderid']."\" />";
         }
      ?>
      <input type="submit" class="btnstyle"
       value="<?php echo $edit ? '更新' : '添加'; ?>幻灯" />
     </p>
     </form>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo " <form method=\"post\" action=\"delete_slider.php\">
                <input type=\"hidden\" name=\"sliderid\" value=\"".$slider['sliderid']."\" />
                
			<p><input type=\"submit\" class=\"btnstyle\" value=\"删除幻灯\" /></p>
                </form>";
       }
     ?>

  
  </fieldset>
<?php
}


// 显示产品编辑表单.
function display_upload_slider_form() {

	?>
<fieldset>
<legend>上传图片</legend>
<form action="upload_slider.php?sliderid=<?php echo $_GET['sliderid'] ?>" method="post" enctype="multipart/form-data">

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