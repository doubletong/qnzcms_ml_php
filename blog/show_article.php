<?php

require_once('../code/db_fns.php');
require_once('../code/common_fns.php');
require_once('../code/user_auth_fns.php');
require_once('../code/output_fns.php');
require_once('../code/news/news_v_fns.php');
require_once('../code/news/news_v_output_fns.php');

$art = get_news_details($_GET['artid']);
update_viewcount($_GET['artid']); //更新显示数据

$category = get_category_details($art['categoryid']);

do_html_doctype($art['title']."_".$category['title']."_日志_".SITENAME);
?>
<link rel="alternate" type="application/rss+xml" title="黑鸟志 RSS Feed" href="http://heiniaozhi.cn/blog/feed.html" />

<?php 
do_html_header();

?>
<!-- start: Page Title -->
	<div id="page-title">

		<div id="page-title-inner">
			<!-- start: Container -->
			<div class="container">
				<h2><i class="ico-settings ico-white"></i> 日志/Blog</h2>
			</div>
			<!-- end: Container  -->
		</div>	
	</div>
	<!-- end: Page Title -->


<div id="wrapper" class="container_24">
  <!--start: Container -->
    	<div class="container">
	
      		<!-- start: Row -->
      		<div class="row">
            	<section class="span8">
    <article>
      <header>
        <h2><?php echo $art['title'] ?></h2>       
      </header>
       <div class="note">
          <?php 
			echo "作者：".$art['added_by']."　发表日期：<time datetime=".$art['added_date'].">".$art['added_date']."</time>　显示：".$art['viewcount'];
			?>
        </div>
      <?php echo $art['content'] ?>
      <footer class="clearfix"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_b" style="line-height: 12px; float:right;"><img src="http://bdimg.share.baidu.com/static/images/type-button-1.jpg?cdnversion=20120831" /> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=button&amp;uid=211528" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
	document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + new Date().getHours();
</script> 
        <!-- Baidu Button END --> 
      </footer>
    </article>
    
    <div id="comments">
     <?php
$artid = $_GET['artid'];
$comment_array = getCommentsByArtice($artid);//获取评论
		display_comments($comment_array); //显示评论
		
		?>

    </div>
    
 <form id="commentform">
<div class="title">
<h3><i class="icon-comment"></i> 我要评论</h3></div>
 
  <input type="hidden" id="artid" value="<?php echo $_GET["artid"] ?>" />
  <p>
   
    <input type="text" id="userName"  size="40" class="required input-xxlarge" placeholder="昵称" />
   </p>
     <p>   
    <input type="email" id="email"  size="40" class="required email input-xxlarge" placeholder="email" />
   </p>
    <p>   
    <input type="url" id="site"  size="40" class="site input-xxlarge" placeholder="个人主页" />
   </p>
   <p>   
   <textarea id="comment" rows="3" cols="70" class="required input-xxlarge"></textarea>
   </p>
   
   <p style="display:none;" id="loading"><img src="../static/img/ajax-loader.gif" alt="提交中…" /></p>
  <p class="pbtn">
      
      <input type="button" id="save" value="评论" />
       </p>
       
    
  
 
  </form>
    
    
  </section>
  
  <section class="span4">
    <nav id="categories">
    <div class="title"><h3><i class="icon-th"></i> 日志分类</h3></div>
      <?php 
			$cat_array = get_categories();
			display_categories($cat_array);
			?>
    </nav>
  </section>
  </div>
  </div>
  
</div>
<?php
do_html_footer();
?>



<script type="text/javascript">

        $(document).ready(function () {
	        $(".nav>li").eq(4).addClass("active");	    
			
			$('#save').click(validate);
			
			$('.required,.site').focus(function(){				
					$(this).next('span').remove();					
			});
			function validate(){
				var dataValid = true;
				$('.required').each(function(){
					
					var cur = $(this);
					cur.next('span').remove();
					if($.trim(cur.val()) == ''){
						cur.after('<span class="text text-error"> 不可以为空</span>');
						dataValid = false; 
					}					
				});
				if(!dataValid) return;
				
				$('.email').each(function() {
					var cur = $(this);
					cur.next('span').remove();
					var emailPattern = /^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
				
					if(!emailPattern.test(cur.val())){
						cur.after('<span class="text text-error"> 无效电子邮箱</span>');
						dataValid = false; 
					}					
                });
				
				if(!dataValid) return;
				
				$('.site').each(function() {
					var cur = $(this);
					cur.next('span').remove();
					var emailPattern = /^(http(s?))\:\/\/(www.)?([0-9a-zA-Z\-]+\.)+[a-zA-Z]{2,6}(\:[0-9]+)?(\/\S*)?$/;
					if(cur.val()!=''){
						if(!emailPattern.test(cur.val())){
							cur.after('<span class="text text-error"> 无效网址</span>');
							dataValid = false; 
						}
					}
                });
				
				if(dataValid){
					$('#loading').show();
					$(this).val('请等待…');
					$.post(
					"../../blog/insert_comment.php",{
						artid:$('#artid').val(),
						comment:$('#comment').val(),
						userName:$('#userName').val(),
						email:$('#email').val(),
						site:$('#site').val()
					},function(data){
						$('#loading').hide();
						$(this).val('评论');
						if($('#comments').find("ul").length == 0){
						//	alert($('#comments').find("ul").length);
							$('#comments').html('<h3><i class="icon-comments"></i> 评论</h3><ul id="commentlist"></ul>');
						}
						$('#commentlist').append(data);
					});
					}
			}
        });
	</script>
<?php
do_html_analytics();
?>