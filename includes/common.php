<?php

define('SITEPATH', 'http://tzgcmsphp.com:83/');
define('SITENAME', '微创医疗');

// Set default timezone
//date_default_timezone_set('UTC');
date_default_timezone_set('Asia/Shanghai');

function do_html_URL($url, $name) {
	// output URL as link and br
?>
 	<a href="<?php echo SITEPATH.$url;?>"><?php echo $name;?></a>
<?php
}

/******************
*@email - Email address to show gravatar for
*@size - size of gravatar
*@default - URL of default gravatar to use
*@rating - rating of Gravatar(G, PG, R, X)
*/
function show_gravatar($email, $size, $default, $rating)
{
echo '<img src="http://www.gravatar.com/avatar.php?gravatar_id='.md5($email).
'&default='.$default.'&size='.$size.'&rating='.$rating.'" width="'.$size.'px"
height="'.$size.'px" />';
}


function front_pagination($paging){
	//前台分页函数
		
	$total_pages = $paging['total_pages'];
	$page = $paging['page'];
	$lastpage = $paging['lastpage'];
	$prev = $paging['prev'];
	$lastpage = $paging['lastpage'];
	$LastPagem1 = $paging['lastPagem1'];
	$next = $paging['next'];
	$targetpage = $paging['targetpage'];
	$stages = $paging['stages'];
	
	$paginate = '';

	if($lastpage > 1)
	{	
	
		$paginate .= '<div class="pagination"><span class="pull-right note">合计'.$total_pages.'篇文章</span><ul>';
		// Previous
		if ($page > 1){
			$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$prev.'/">前页</a></li>';
		}else{
			$paginate.= '<li class="disabled"><a href="#">前页</a></li>';	}
			

		
		// Pages	
		if ($lastpage < 7 + ($stages * 2))	// Not enough pages to breaking it up
		{	
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= '<li class="active"><a href="#">'.$counter.'</a></li>';
				}else{
					$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$counter.'/">'.$counter.'</a></li>';
					}					
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
						$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$counter.'/">'.$counter.'</a></li>';
						}					
				}
				$paginate.= "...";
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$LastPagem1.'/">'.$LastPagem1.'</a></li>';
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$lastpage.'/">'.$lastpage.'</a></li>';		
			}
			// Middle hide some front and some back
			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage1.'/">1</a></li>';
				$paginate.= '<li><a href="'.$targetpage2.'/">2</a></li>';
				$paginate.= "...";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
					}else{
						$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$counter.'/">'.$counter.'</a></li>';
						}					
				}
				$paginate.= "...";
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$LastPagem1.'/">'.$LastPagem1.'</a></li>';
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$lastpage.'/">'.$lastpage.'</a></li>';		
			}
			// End only hide early pages
			else
			{
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage1.'/">1</a></li>';
				$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage2.'/">2</a></li>';
				$paginate.= "...";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<li class='active'><a href='#'>$counter</a></li>";
					}else{
						$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$counter.'/">'.$counter.'</a></li>';
						}					
				}
			}
		}
					
				// Next
		if ($page < $counter - 1){ 
			$paginate.= '<li><a href="'.SITEPATH.'blog/'.$targetpage.$next.'/">后页</a></li>';
		}else{
			$paginate.= "<li class='disabled'><a href='#'>后页</a></li>";
			}
			
		$paginate.= "</ul></div>";		
	
	
}

 // pagination
 echo $paginate;

}



function pagination($paging){
	//后台分页函数	
	$total_pages = $paging['total_pages'];
	$page = $paging['page'];
	$lastpage = $paging['lastpage'];
	$prev = $paging['prev'];
	$lastpage = $paging['lastpage'];
	$LastPagem1 = $paging['lastPagem1'];
	$next = $paging['next'];
	$targetpage = $paging['targetpage'];
	$stages = $paging['stages'];
	
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

?>