<?php
function display_categories($cat_array) {
	if (!is_array($cat_array)) {
		echo "<p class=\"info\">还没有分类。</p>";
		return;
	}
	echo "<ul class=\"option-set\" data-option-key=\"filter\">";
	echo '<li><a href="#filter" data-option-value="*" class="selected">全部</a></li>';
	foreach ($cat_array as $row)  {
		
		$title = $row['title'];
		$filter = "cat".$row['categoryid'];

		echo "<li>";
	    echo '<a href="#filter" data-option-value=".'.$filter.'">'.$title.'</a>';	
		echo "</li>";
	}
	
	echo "</ul>";

}


function display_designs($design_array) {
	if (!is_array($design_array)) {
		echo "<p class=\"info\">没有案例数据。</p>";
		return;
	}
	echo "<div id=\"portfolio-wrapper\" class=\"row\">";
	foreach ($design_array as $row)  {	
		$title = $row['title'];
		$thumb = $row['thumb'];
		$description = $row['description'];
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);
		$filter = "cat".$row['categoryid'];
		
		echo '<div class="span3 portfolio-item '.$filter.'" data-category="'.$filter.'">';
		echo '<div class="picture">';
		echo "<a href=\"".SITEPATH."graphic/work_".$row['designid']."/\" title=\"".$title."\">";
		echo "<img src=\"".SITEPATH."static/uploads/design/thumb/".$thumb."\" alt=\"$title\" />";
		echo '<div class="image-overlay-link"></div></a>';
		echo '<div class="item-description alt">';
		echo "<h4><a href=\"".SITEPATH."graphic/work_".$row['designid']."/\">$title</a></h4>";
		echo "<p>".$description."</p>";
		echo "</div>";
		echo '<div class="post-meta"><span><i class="icon-time"></i>'.$addedDate.'</span></div>';
		echo "</div>"; 
		echo "</div>"; 

	}
	echo "</div>";

}


						
							
						
						
				


function display_designsforhome($design_array) {
	if (!is_array($design_array)) {
		echo "<p class=\"info\">没有案例数据。</p>";
		return;
	}


	foreach ($design_array as $row)  {
		$title = $row['title'];
		$des = $row['description'];
		$thumb = $row['thumb'];
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);
		echo '<div class="span3">';
		echo '<div class="picture">';
		echo "<a href=\"".SITEPATH."graphic/work_".$row['designid']."/\" >";
		echo "<img src=\"".SITEPATH."static/uploads/design/thumb/".$thumb."\"  />";
		echo "<div class=\"image-overlay-link\"></div></a>";		
		echo '</div><div class="item-description">';
		echo "<h4 class=\"title\"><a href=\"".SITEPATH."graphic/work_".$row['designid']."/\" >".$row['title']."</a></h4>";
		//echo "<p>$des</p>";
		echo "</div></div>";
	}


}






function display_images_thumbs($img_array) {

	if (!is_array($img_array)) {
		echo "<p class=\"info\">还没有图片。</p>";
		return;
	}

	echo '<div id="bx-pager">';
	$i= 0;
	foreach ($img_array as $row)  {
		
		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);

		echo '<a data-slide-index="'.$i.'" href="">';
		echo '<img src="../../design/showthumb.php?thumb='.SITEPATH.'static/uploads/design/'.$row['imgurl'].'"  alt="'.$addedDate.'"/>';
		echo "</a>"; 
		$i++;
	}
	echo "</div>";
	

}


function display_images($img_array) {

	if (!is_array($img_array)) {
		
		echo '<div class="alert alert-info">';
				echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
 				echo '<i class="icon-info-sign"></i> 还没有图片。</div>';
		return;
	}
	echo '<ul class="bxslider">';
	foreach ($img_array as $row)  {

		$addedDate =strtotime($row['addeddate']);
		$addedDate = date('Y-m-d',$addedDate);

		echo '<li>';
		echo '<img src="'.SITEPATH.'static/uploads/design/'.$row['imgurl'].'" alt="'.$addedDate.'" />';
		echo "</li>";

	}
	echo '</ul>';

}



?>