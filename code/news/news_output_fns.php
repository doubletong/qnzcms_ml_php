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
       value="<?php echo $edit ? '更新' : '添加'; ?>分类" />
       </p>
       
       </form>
     
     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "<form method=\"post\" action=\"delete_category.php\">
                <input type=\"hidden\" name=\"catid\" value=\"".$category['categoryid']."\" />
                <p><input class=\"btnstyle\" type=\"submit\" value=\"删除分类\" /></p>
                </form></td>";
       }
     ?>

  
  </fieldset>
<?php
}




// 显示分类编辑表单.
function display_news_form($news = '') {

  // if passed an existing category, proceed in "edit mode"
  $edit = is_array($news);

  // most of the form is in plain HTML with some
  // optional PHP bits throughout
?>
<fieldset>
<legend><?php echo $edit ? '更新新闻' : '添加新闻'; ?></legend>

  <form method="post"  action="<?php echo $edit ? 'edit_news.php' : 'insert_news.php'; ?>">
  <p>
    <label>主题：</label>
    <input type="text" name="title" size="50" maxlength="150" class="inputext"
          value="<?php echo $edit ? $news['title'] : ''; ?>" />
   </p>
   
    <div style="padding-left:45px;margin-bottom:30px;">
    <?php
    $ckeditor = new CKEditor();
$ckeditor->basePath = '../../plugin/ckeditor/';
$ckeditor->config['filebrowserBrowseUrl'] = '../../plugin/ckfinder/ckfinder.html';
$ckeditor->config['filebrowserImageBrowseUrl'] = '../../plugin/ckfinder/ckfinder.html?type=Images';
$ckeditor->config['filebrowserFlashBrowseUrl'] = '../../plugin/ckfinder/ckfinder.html?type=Flash';
$ckeditor->config['filebrowserUploadUrl'] = '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';
$ckeditor->config['filebrowserImageUploadUrl'] = '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';
$ckeditor->config['filebrowserFlashUploadUrl'] = '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

$content = $edit ? $news['content'] : '';
$ckeditor->editor('newscontent',$content);
 ?>   
   </div>

   <p>
   <label>描述：</label>
   <textarea name="description" rows="3" class="inputext" cols="70"><?php echo $edit ? $news['description'] : ''; ?></textarea>
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
               if (($edit) && ($thiscat['categoryid'] == $news['categoryid'])) {
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
            echo "<input type=\"hidden\" name=\"articleid\" value=\"".$news['articleid']."\" />";
         }
      ?>
      <input type="submit"
       value="<?php echo $edit ? '更新' : '添加'; ?>新闻" class="btnstyle" />
       
       </p>
       </form>

     <?php
        if ($edit) {
          //allow deletion of existing categories
          echo "
                <form method=\"post\" action=\"delete_news.php\">
                <input type=\"hidden\" name=\"articleid\" value=\"".$news['articleid']."\" />
  		<p><input type=\"submit\" value=\"删除新闻\" class=\"btnstyle\" /></p></form>";
       }
     ?>

  </fieldset>
<?php
}






function display_categories($cat_array) {
  if (!is_array($cat_array)) {
     echo "<p class=\"info\">还没有分类。</p>";
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




function display_news($news_array) {
  //显示所有新闻
  if (!is_array($news_array)) {
    echo "<p>还没有新闻。</p>";
  } else {
    //create table
    echo "<table class=\"table table-striped table-bordered\"><thead><tr><th>主题</th><th>显示</th><th>日期</th><th>发布者</th><th>操作</th></tr></thead><tbody>";

    //create a table row for each book
    foreach ($news_array as $row) {
      $url = "blog/article_".$row['articleid'].".html";
      $editurl = "edit_news_form.php?artid=".$row['articleid'];
      echo "<tr><td>";      
        do_html_url($url, $row['title']);     
      echo "</td><td>".$row['viewcount']."</td>";
        echo "<td>".$row['added_date']."</td>";
        echo "<td>".$row['added_by']."</td><td>";        
       echo '<a href="'.$editurl.'" class="btn btn-mini"><i class="icon-edit"></i> 编辑</a>';
      echo "</td></tr>";
    }

    echo "</tbody></table>";
  }

}



function article_pagination($paging){
	//文章分页函数
	$stages = 8;
	
   $catid = mysql_escape_string($_GET['catid']);
   if($catid>0){
	   $targetpage = "newslist.php?catid=".$catid."&amp;page=";
   }else{
		$targetpage = "newslist.php?page=";
   }
   
	
	
	$total_pages = $paging['total_pages'];
	$page = $paging['page'];
	$lastpage = $paging['lastpage'];
	$prev = $paging['prev'];
	$lastpage = $paging['lastpage'];
	$LastPagem1 = $paging['lastPagem1'];
	$next = $paging['next'];
	
	$paginate = '';

	if($lastpage > 1)
	{	
	
		$paginate .= "<div class='pagination'><span class='fr'>合计".$total_pages."篇文章</span><ul>";
		// Previous
		if ($page > 1){
			$paginate.= "<li><a href='$targetpage$prev'>前页</a></li>";
		}else{
			$paginate.= "<li class='disabled'><a href='#'>前页</a></li>";	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
				}else{
					$paginate.= "<li><a href='$targetpage$counter'>$counter</a></li>";}					
			}
		}
		elseif($lastpage > 5 + ($stages * 2))	// Enough pages to hide a few?
		{
			// Beginning only hide later pages
			if($page < 1 + ($stages * 2))		
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage$counter'>$counter</a></li>";}					
				}
				$paginate.= "...";
				$paginate.= "<li><a href='$targetpage$LastPagem1'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage$lastpage'>$lastpage</a></li>";		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<li><a href='$targetpage1'>1</a></li>";
				$paginate.= "<li><a href='$targetpage2'>2</a></li>";
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage$counter'>$counter</a></li>";}					
				}
				$paginate.= "...";
				$paginate.= "<li><a href='$targetpage$LastPagem1'>$LastPagem1</a></li>";
				$paginate.= "<li><a href='$targetpage$lastpage'>$lastpage</a></li>";		
			}
			// End only hide early pages
			else
			{
				$paginate.= "<li><a href='$targetpage1'>1</a></li>";
				$paginate.= "<li><a href='$targetpage2'>2</a></li>";
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
					}else{
						$paginate.= "<li><a href='$targetpage$counter'>$counter</a></li>";}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= "<li><a href='$targetpage$next'>后页</a></li>";
		}else{
			$paginate.= "<li class='disabled'><a href='#'>后页</a></li>";
			}
			
		$paginate.= "</ul></div>";		
	
	
}

 // pagination
 echo $paginate;

}



function display_article_comments($comment_array) {
  //显示评论
  if (!is_array($comment_array)) {
    echo "<p class='text-info'>还没有评论。</p>";
  } else {
    //create table
    echo "<table class=\"table table-striped table-bordered\"><thead><tr><th>评论</th><th>日期</th><th>发布者</th><th>IP</th><th>邮箱</th><th>主页</th><th>操作</th></tr></thead><tbody>";

    //create a table row for each book
    foreach ($comment_array as $row) {
      $url = "../../blog/article_".$row['articleid'].".html";
      $delurl = "delete_comment.php?commentid=".$row['commentid'];
      echo "<tr><td style='width:300px;'>".$row['comment']."</td>";
        echo "<td>".$row['added_date']."</td>";		
        echo "<td>".$row['added_by']."</td>";
		echo "<td>".$row['added_ip']."</td>"; 		
		echo "<td>".$row['email']."</td>";
		echo "<td>".$row['site']."</td><td>";
	   echo '<a href="'.$url.'" class="btn btn-mini"><i class="icon-eye-open"></i> 查看</a> '; 
       echo '<a href="'.$delurl.'" class="btn btn-mini"><i class="icon-trash"></i> 删除</a>';
      echo "</td></tr>";
    }

    echo "</tbody></table>";
  }

}


?>

