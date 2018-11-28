<?php
require_once('output_fns.php');


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
  <table class="tblform">
  <tr>
    <td>主题：</td>
    <td><input type="text" name="title" size="40" maxlength="40"
          value="<?php echo $edit ? $category['title'] : ''; ?>" /></td>
   </tr>
   <tr>
   <td>描述：</td>
   <td><textarea name="description" rows="3" cols="30"><?php echo $edit ? $category['description'] : ''; ?></textarea></td>
   </tr>
    <td>排序：</td>
    <td><input type="text" name="importance" size="3" maxlength="11"
          value="<?php echo $edit ? $category['importance'] : '0'; ?>" /></td>
   </tr>
  <tr>
    <td <?php if (!$edit) { echo "colspan=2";} ?> align="center">
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"categoryid\" value=\"".$category['categoryid']."\" />";
         }
      ?>
      <input type="submit"
       value="<?php echo $edit ? '更新' : '添加'; ?>分类" /></form>
     </td>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "<td>
                <form method=\"post\" action=\"delete_category.php\">
                <input type=\"hidden\" name=\"catid\" value=\"".$category['categoryid']."\" />
                <input type=\"submit\" value=\"删除分类\" />
                </form></td>";
       }
     ?>
  </tr>
  </table>
  
  </fieldset>
<?php
}





// 显示产品编辑表单.
function display_product_form($news = '') {

  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($news);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>



<fieldset>
<legend><?php echo $edit ? '更新产品' : '添加产品'; ?></legend>


  <form method="post"
      action="<?php echo $edit ? 'edit_product.php' : 'insert_product.php'; ?>">
  <table class="tblform">
  <tr>
    <td>主题：</td>
    <td><input type="text" name="title" size="40" maxlength="40"
          value="<?php echo $edit ? $news['title'] : ''; ?>" /></td>
   </tr>
   
    <td colspan="2">
    <?php
    $ckeditor = new CKEditor();
$ckeditor->basePath = '../../ckeditor/';
$ckeditor->basePath = '../../ckeditor/';
$ckeditor->config['filebrowserBrowseUrl'] = '../../ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '../../ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '../../ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
$ckeditor->config['filebrowserFlashUploadUrl'] = '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

$content = $edit ? $news['content'] : '';

$ckeditor->editor('content',$content);
 ?>   
   </td>
   </tr>
   <tr>
   <td>描述：</td>
   <td><textarea name="description" rows="3" cols="30"><?php echo $edit ? $news['description'] : ''; ?></textarea></td>
   </tr>
    <td>分类：</td>
    <td>
    <select name="categoryid">
      <?php
          // list of possible categories comes from database
          $cat_array=get_categories();
          foreach ($cat_array as $thiscat) {
               echo "<option value=\"".$thiscat['categoryid']."\"";
               // if existing book, put in current catgory
               if (($edit) && ($thiscat['categoryid'] == $news['categoryid'])) {
                   echo " selected";
               }
               echo ">".$thiscat['title']."</option>";
          }
          ?>
          </select>
    </td>
   </tr>
  
  <tr>
    <td <?php if (!$edit) { echo "colspan=2";} ?> align="center">
      <?php
         if ($edit) {
            echo "<input type=\"hidden\" name=\"productid\" value=\"".$news['productid']."\" />";
         }
      ?>
      <input type="submit"
       value="<?php echo $edit ? '更新' : '添加'; ?>产品" /></form>
     </td>
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "<td>
                <form method=\"post\" action=\"delete_product.php\">
                <input type=\"hidden\" name=\"productid\" value=\"".$news['productid']."\" />
                <input type=\"submit\" value=\"删除产品\" />
                </form></td>";
       }
     ?>
  </tr>
  </table>
  
  </fieldset>
  
  


<?php
}

// 显示产品编辑表单.
function display_uploadthumb_form() {

?>
<form action="upload_thumb.php?proid=<?php echo $_GET['proid'] ?>" method="post" enctype="multipart/form-data">
<div>
<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
<label for="userfile">选择缩略图:</label>
<input type="file" name="userfile" id="userfile"/>
<input type="submit" value="上传"/>
</div>
</form>

<?php

}



function display_categories($cat_array) {
  if (!is_array($cat_array)) {
     echo "<p>No categories currently available</p>";
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
    echo "<td><a href=\"edit_category_form.php?catid=".$row['categoryid']."\">编辑</a></td>";
    
    echo "</tr>";
  }
  echo "</table>";
  
}






function display_products($book_array) {
  //显示所有产品
  if (!is_array($book_array)) {
    echo "<p>还没有新闻。</p>";
  } else {
    //create table
    echo "<table class=\"tbllist\"><tr><th>缩略图</th><th>主题</th><th>显示</th><th>日期</th><th>发布者</th><th></th></tr>";

    //create a table row for each book
    foreach ($book_array as $row) {
      $url = "show_product.php?proid=".$row['productid'];
      $editurl = "edit_product_form.php?proid=".$row['productid'];
      $uploadthumb = "upload_thumb_form.php?proid=".$row['productid'];
      echo "<tr><td>";  
      echo isset($row['thumbnails'])? "<img src=\"../../uploads/products/thumb/".$row['thumbnails']."\" class=\"thumb\"/>" : "无缩略图";
      echo "</td><td>";
        do_html_url($url, $row['title']);     
      echo "</td><td>".$row['viewcount']."</td>";
        echo "<td>".$row['added_date']."</td>";
        echo "<td>".$row['added_by']."</td><td>";   
        do_html_url($uploadthumb, '上传缩略图');        
        do_html_url($editurl, '编辑');     
      echo "</td></tr>";
    }

    echo "</table>";
  }

}


?>