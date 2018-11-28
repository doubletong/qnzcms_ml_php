<?php
function display_logos($logo_array) {
	if (!is_array($logo_array)) {
		echo "<p class=\"info\">没有标志数据。</p>";
		return;
	}
	echo '<div id="portfolio-wrapper" class="row">';
	foreach ($logo_array as $row)  {	
		$title = $row['title'];
		$imgurl = $row['imgurl'];

		echo '<div class="span2 portfolio-item"><div class="picture">';
		echo '<img src="'.SITEPATH.'static/uploads/logo/'.$imgurl.'" alt="'.$title.'" />';
		echo "</div></div>"; 

	}
	echo "</div>";

}


?>
					