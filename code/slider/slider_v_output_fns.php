<?php 
function display_sliders($slider_array) {
	if (!is_array($slider_array)) {
		echo "<p class=\"info\">没有幻灯数据。</p>";
		return;
	}
	echo "<div class=\"slider-wrapper\">";
	echo "<div id=\"da-slider\" class=\"da-slider\">";
	foreach ($slider_array as $row)  {
		
		$title = $row['title'];
		$description = $row['description'];
		$link = $row['link'];
		$imgurl = $row['imgurl'];		
		echo "<div class=\"da-slide\">";
		echo "<h2>$title</h2>";	
		echo "<p>$description</p>";
		echo "<a href=\"$link\" class=\"da-link\">更多内容</a>";
		echo '<div class="da-img"><img src="static/uploads/slider/'.$imgurl.'" alt="'.$title.'" /></div>';	
		echo "</div>";
	}
	?>
	
		<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
	    </nav>
    </div>
	</div>
<?php 
}

?>