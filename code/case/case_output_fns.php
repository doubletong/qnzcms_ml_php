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


  <form method="post"
      action="<?php echo $edit ? 'edit_category.php' : 'insert_category.php'; ?>">
  <p>
    <label>主题：</label>
    <input type="text" name="title" size="40" maxlength="40" class="inputext"
          value="<?php echo $edit ? $category['title'] : ''; ?>" />
   </p>
   <p>
    <label>描述：</label>
   <textarea name="description" rows="3" cols="70" class="inputext"><?php echo $edit ? $category['description'] : ''; ?></textarea>
   </p>
   <p>
    <label>排序：</label>
    <input type="text" name="importance" size="3" maxlength="11" class="inputext"
          value="<?php echo $edit ? $category['importance'] : '0'; ?>" />
   </p>
  <p>
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"categoryid\" value=\"".$category['categoryid']."\" />";
         }
      ?>
      <input type="submit" class="btnstyle"
       value="<?php echo $edit ? '更新' : '添加'; ?>分类" /></form>
     </p>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "
                <form method=\"post\" action=\"delete_category.php\">
                <input type=\"hidden\" name=\"catid\" value=\"".$category['categoryid']."\" />
               <p><input type=\"submit\" class=\"btnstyle\" value=\"删除分类\" />
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
function display_case_form($case = '') {

  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($case);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>



<fieldset>
<legend><?php echo $edit ? '更新案例' : '添加案例'; ?></legend>


  <form method="post"
      action="<?php echo $edit ? 'edit_case.php' : 'insert_case.php'; ?>">
  <p>
    <label>主题：</label>
    <input type="text" name="title" size="40" maxlength="40" class="inputext"
          value="<?php echo $edit ? $case['title'] : ''; ?>" />
   </p>

   <p>
   <label>描述：</label>
   <textarea name="description" rows="3" cols="70" class="inputext"><?php echo $edit ? $case['description'] : ''; ?></textarea>
   </p>
      <p>
   <label>网址：</label>
    <input type="text" name="demourl" size="40" maxlength="150" class="inputext"
          value="<?php echo $edit ? $case['demourl'] : ''; ?>" />
   </p>
   <p>
    <label>分类：</label>
   
    <select name="categoryid" class="inputext">
      <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".$thiscat['categoryid']."\"";
               // if existing book, put in current catgory
               if (($edit) && ($thiscat['categoryid'] == $case['categoryid'])) {
                   echo " selected";
               }
               echo ">".$thiscat['title']."</option>";
          }
          ?>
          </select>
    </p>
    
  <p>

      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"caseid\" value=\"".$case['caseid']."\" />";
         }
      ?>
      <input type="submit" class="btnstyle"
       value="<?php echo $edit ? '更新' : '添加'; ?>案例" /></form>
     </p>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "
                <form method=\"post\" action=\"delete_case.php\">
                <input type=\"hidden\" name=\"caseid\" value=\"".$case['caseid']."\" />
  		
               <p> <input type=\"submit\" class=\"btnstyle\" value=\"删除案例\" /></p>
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
<form action="upload_thumb.php?caseid=<?php echo $_GET['caseid'] ?>" method="post" enctype="multipart/form-data">
<div>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<label for="userfile">选择缩略图:</label>
<input type="file" name="userfile" id="userfile"/>
<input type="submit" class="btnstyle" value="上传"/>
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
<form action="upload_image.php?caseid=<?php echo $_GET['caseid'] ?>" method="post" enctype="multipart/form-data">
<div>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<label for="userfile">选择大图:</label>
<input type="file" name="userfile" id="userfile"/>
<input type="submit" class="btnstyle" value="上传"/>
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
  echo "<table class=\"tbllist\"><tr><th>序</th><th>主题</th><th>描述</th><th>日期</th><th></th></tr>";
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
    echo "<td><a class=\"edit\" href=\"edit_category_form.php?catid=".$row['categoryid']."\">编辑</a></td>";
    
    echo "</tr>";
  }
  echo "</table>";
  
}


function display_cases($book_array) {
  //显示所有案例
  if (!is_array($book_array)) {
    echo "<p class=\"info\">还没有案例。</p>";
  } else {
    //create table
    echo "<table class=\"tbllist\"><tr><th>缩略图</th><th>主题</th><th>显示</th><th>日期</th><th>发布者</th><th></th></tr>";

    //create a table row for each book
    foreach ($book_array as $row) {
      $url = "show_case.php?caseid=".$row['caseid'];
      $addedDate =strtotime($row['addeddate']);
      $addedDate = date('Y-m-d',$addedDate);
      
      echo "<tr><td>";  
      if(isset($row['thumb'])){
       echo "<img src=\"showthumb.php?thumb=../../static/uploads/case/thumb/".$row['thumb']."\" />" ;
       echo  "<a href=\"upload_thumb_form.php?caseid=".$row['caseid']."\" class=\"editimg\">修改图片</a>";
       }else{
       	echo  "<a href=\"upload_thumb_form.php?caseid=".$row['caseid']."\" class=\"addimg\">上传缩略图</a>";
       }
      echo "</td><td>";
        do_html_url($url, $row['title']);     
      echo "</td><td>".$row['viewcount']."</td>";
        echo "<td>".$addedDate."</td>";
        echo "<td>".$row['addedby']."</td><td>";   
        echo "<a href=\"edit_case_form.php?caseid=".$row['caseid']."\" class=\"edit\">编辑</a>";
        echo "　<a href=\"caseimg.php?caseid=".$row['caseid']."\" class=\"imgs\">查看大图</a>";
        
      echo "</td></tr>";
    }

    echo "</table>";
  }

}



function display_images($img_array) {

	global $photos_table;
	$photos_table = true;


	if (!is_array($img_array)) {
		echo "<p class=\"info\">还没有图片。</p>";
		return;
	}
	
	
	echo  "<form name=\"photos_table\" action=\"delete_photos.php?caseid=".$_GET['caseid']."\" method=\"post\">";
	echo "<table class=\"tbllist\"><tr><th>缩略图</th><th>上传者</th><th>日期</th><th>删除</th></tr>";
	foreach ($img_array as $row)  {
		
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);

		echo "<tr>";
		echo "<td><a href=\"../../static/uploads/case/".$row['imgurl']."\"><img src=\"showthumb.php?thumb=../../static/uploads/case/".$row['imgurl']."\" /></a></td>";
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
    echo "<a class=\"delete\" href=\"#\" onClick=\"photos_table.submit();\">删除</a>";
  } 

}


?>