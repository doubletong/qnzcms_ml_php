<?php
require_once('../../code/admin/output_fns.php');


// 显示分类编辑表单.
function display_category_form($category = '') {

  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($category);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>
<fieldset>
<legend><?php echo $edit ? '更新分类' : '添加分类'; ?></legend>


  <form method="post"  class="form-horizontal"
      action="<?php echo $edit ? 'edit_category.php' : 'insert_category.php'; ?>">
      
      
        <div class="control-group">
        <label class="control-label" for="title">主题</label>
        <div class="controls">
           <input type="text" name="title" id="title"
          value="<?php echo $edit ? $category['title'] : ''; ?>" />
        </div>
      </div>
      
      
      <div class="control-group">
        <label class="control-label" for="description">描述</label>
        <div class="controls">
          <textarea name="description" id="description" class="input-xxlarge"><?php echo $edit ? $category['description'] : ''; ?></textarea>
        </div>
      </div>
      
 
         <div class="control-group">
        <label class="control-label" for="importance">序号</label>
        <div class="controls">
           <input type="number" name="importance" id="importance"
          value="<?php echo $edit ? $category['importance'] : '0'; ?>" />
        </div>
      </div>
      
  
  <div class="form-actions">
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"categoryid\" value=\"".$category['categoryid']."\" />";
         }
      ?>
      <input type="submit" class="btn btn-primary"
       value="<?php echo $edit ? '更新' : '添加'; ?>分类" /></form>
     </div>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "
                <form method=\"post\" action=\"delete_category.php\" class=\"form-inline\" >
                <input type=\"hidden\" name=\"catid\" value=\"".$category['categoryid']."\" />
               <p><input type=\"submit\" class=\"btn btn-danger\" value=\"删除分类\" />
                </p>
  		</form>";
       }
     ?>
  </tr>
  </table>
  
  </fieldset>
<?php
}





// 显示案例编辑表单.
function display_design_form($design = '') {

  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($design);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>



<fieldset>
<legend><?php echo $edit ? '更新案例' : '添加案例'; ?></legend>


  <form method="post" class="form-horizontal"
      action="<?php echo $edit ? 'edit_design.php' : 'insert_design.php'; ?>">
      
   <div class="control-group">
    <label class="control-label" for="inputtitle">主题</label>
    <div class="controls">
      <input type="text" id="inputtitle" name="inputtitle" 
          value="<?php echo $edit ? $design['title'] : ''; ?>" />
    </div>
  </div>
  
  
  <div class="control-group">
    <label class="control-label" for="description">描述</label>
    <div class="controls">
      <textarea name="description" id="description" class="input-xxlarge"><?php echo $edit ? $design['description'] : ''; ?></textarea>
    </div>
  </div>
  
  <div class="control-group">
    <label class="control-label" for="demourl">网址</label>
    <div class="controls">
       <input type="url" name="demourl" id="demourl"  class="input-xxlarge"
          value="<?php echo $edit ? $design['demourl'] : ''; ?>" />
    </div>
  </div>
 
    <div class="control-group">
    <label class="control-label" for="categoryid">分类</label>
    <div class="controls">
        <select name="categoryid" id="categoryid">
      <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".$thiscat['categoryid']."\"";
               // if existing book, put in current catgory
               if (($edit) && ($thiscat['categoryid'] == $design['categoryid'])) {
                   echo " selected";
               }
               echo ">".$thiscat['title']."</option>";
          }
          ?>
          </select>
    </div>
  </div>
  
  
    
  <div class="form-actions">

      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"designid\" value=\"".$design['designid']."\" />";
         }
      ?>
      <input type="submit" class="btn btn-primary"
       value="<?php echo $edit ? '更新' : '添加'; ?>案例" /></form>
     </div>
     
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "
                <form method=\"post\"  class=\"form-inline\" action=\"delete_design.php\">
                <input type=\"hidden\" name=\"designid\" value=\"".$design['designid']."\" />
  		
               <p> <input type=\"submit\" class=\"btn btn-danger\" value=\"删除案例\" /></p>
                </form></td>";
       }
     ?>

  
  </fieldset>
  
  


<?php
}

// 显示案例编辑表单.
function display_uploadthumb_form() {

?>
<fieldset>
<legend>上传缩略图</legend>
<form action="upload_thumb.php?designid=<?php echo $_GET['designid'] ?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="max_file_size" value="1000000" />
<div class="fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://img.heiniaozhi.cn/200x150" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
  <div>
    <span class="btn btn-file"><span class="fileupload-new">选择缩略图</span><span class="fileupload-exists">修改</span><input type="file" name="userfile" id="userfile"/></span>
    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
  </div>
</div>

<div class="form-actions">

<input type="submit" class="btn btn-primary" value="上传"/>
</div>
</form>
 </fieldset>
<?php

}

// 显示案例编辑表单.
function display_uploadphoto_form() {

	?>
<fieldset>
<legend>上传大图</legend>
<form action="upload_image.php?designid=<?php echo $_GET['designid'] ?>" method="post" enctype="multipart/form-data">

<input type="hidden" name="max_file_size" value="1000000" />
<div class="fileupload fileupload-new" data-provides="fileupload">
  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="http://img.heiniaozhi.cn/200x150" /></div>
  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
  <div>
    <span class="btn btn-file"><span class="fileupload-new">选择大图</span><span class="fileupload-exists">修改</span><input type="file" name="userfile" id="userfile"/></span>
    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
  </div>
</div>

<div class="form-actions">
<input type="submit" class="btn btn-primary" value="上传"/>
</div>
</form>
 </fieldset>
<?php

}






function display_categories($cat_array) {
  if (!is_array($cat_array)) {
     echo "<p>还没有分类。</p>";
     return;
  }
  echo "<table class=\"dTable table table-bordered\"><thead><tr><th>序</th><th>主题</th><th>描述</th><th>日期</th><th>操作</th></tr></thead>";
 	echo "<tbody>";
 
  foreach ($cat_array as $row)  {
    $importance = $row['importance'];
    $url = "show_cat.php?catid=".$row['categoryid'];
    $title = $row['title'];
    $description = $row['description'];
    $addedDate =strtotime($row['added_date']);
    $addedDate = date('Y-m-d',$addedDate);
    
    echo "<tr>";
    echo "<td>".$importance."</td>";
    echo "<td>";
    do_html_url($url, $title);
    echo "</td>";
    echo "<td>".$description."</td>";
    
    echo "<td>".$addedDate."</td>";
    echo "<td><a class=\"btn btn-primary btn-mini\" href=\"edit_category_form.php?catid=".$row['categoryid']."\"><i class=\"icon-edit\"></i> 编辑</a></td>";
    
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  
}


function display_designs($book_array) {
  //显示所有案例
  if (!is_array($book_array)) {
    echo "<p class=\"info\">还没有案例。</p>";
  } else {
    //create table
    echo "<table class=\"dTable table table-bordered\"><thead><tr><th>缩略图</th><th>主题</th><th>显示</th><th>日期</th><th>发布者</th><th>操作</th></tr></thead>";
	echo "<tbody>";
    //create a table row for each book
    foreach ($book_array as $row) {
      $url = "show_design.php?designid=".$row['designid'];
      $addedDate =strtotime($row['addeddate']);
      $addedDate = date('Y-m-d',$addedDate);
      
      echo "<tr><td>";  
      if(isset($row['thumb'])){
       echo "<img src=\"showthumb.php?thumb=../../static/uploads/design/thumb/".$row['thumb']."\" />" ;
       echo  " <a href=\"upload_thumb_form.php?designid=".$row['designid']."\" class=\"btn btn-mini\" title=\"修改图片\"><i class=\"icon-edit\"></i></a>";
       }else{
       	echo  " <a href=\"upload_thumb_form.php?designid=".$row['designid']."\" class=\"btn btn-mini\" title=\"上传图片\"><i class=\"icon-upload\"></i></a>";
       }
      echo "</td><td>";
        do_html_url($url, $row['title']);     
      echo "</td><td>".$row['viewcount']."</td>";
        echo "<td>".$addedDate."</td>";
        echo "<td>".$row['addedby']."</td><td>";   
        echo "<a href=\"edit_design_form.php?designid=".$row['designid']."\" class=\"btn btn-mini btn-primary\"><i class=\"icon-edit\"></i> 编辑</a>";
        echo " <a href=\"designimg.php?designid=".$row['designid']."\" class=\"btn btn-mini\"><i class=\"icon-picture\"></i> 查看大图</a>";
        
      echo "</td></tr>";
    }

    echo "</tbody></table>";
  }

}



function display_images($img_array) {

	global $photos_table;
	$photos_table = true;


	if (!is_array($img_array)) {
		echo '<div class="alert alert-info">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
 				echo '<i class="icon-info-sign"></i> 还没有图片。</div>';
		return;
	}
	
	
	echo  "<form name=\"photos_table\" action=\"delete_photos.php?designid=".$_GET['designid']."\" method=\"post\">";
	echo "<table class=\"table table-bordered\"><tr><th>缩略图</th><th>上传者</th><th>日期</th><th>删除</th></tr>";
	foreach ($img_array as $row)  {
		
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);

		echo "<tr>";
		echo "<td><a href=\"../../static/uploads/design/".$row['imgurl']."\"><img src=\"showthumb.php?thumb=../../static/uploads/design/".$row['imgurl']."\" /></a></td>";
		echo "<td>";
		echo $row['addedby'];
		echo "</td>";
		
		echo "<td>".$addedDate."</td>";
		echo "<td><input type=\"checkbox\" name=\"del_me[]\" value=\"".$row['imgurl']."\"/></td>";

		echo "</tr>";
	}
	echo "</table>";
	echo "</form>";
	echo "<div class=\"toolbar\">";
               		
               		
  // only offer the delete option if bookmark table is on this page

  if ($photos_table == true) {
	  	echo '<div class="text-right">';
		echo "<a class=\"btn btn-danger\" href=\"#\" onClick=\"photos_table.submit();\"><i class=\"icon-remove\"></i> 删除</a>";
		echo '</div>';
  } 

}


?>