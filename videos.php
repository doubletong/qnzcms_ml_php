<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/video.php");

$videoClass = new Video();
$data = $videoClass->fetch_all(18);
$data1 = $videoClass->fetch_all(17);
$i=1;
$j=1;
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9 ie8"> <![endif]-->
<!--[if IE 9]>         <html class="no-js gt-ie9 ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js gt-ie9">
<!--<![endif]-->

<head>
    <title><?php echo "视频中心-".SITENAME; ?></title>    
    <?php require_once('includes/meta.php') ?>
  
</head>
<body>
<?php require_once('includes/header.php') ?>

    <?php //echo $data["content"];?>   
    
    <div class="striving">
<!--banner-->
<div class="inside_banner news_media_banner" style="background-image:url(images/news_video_banner.jpg)">
        <div class="wrap clear">
            <div class="inside_banner_txt pos_center">
                <h1 class="wow fadeInLeft">视频中心</h1>
                <p class="wow fadeInLeft">聚焦每一次突破与精彩</p>
            </div>
        </div>
    </div>
<!--banner end-->

<!--main-->
    <div class="main news">
        <div class="wrap">
            <div class="tab_nav wow fadeInUp">
                <ul class="clear">
                    <li class="active">品牌视频</li>
                    <li>产品视频</li>
                </ul>
            </div>
            <div class="news_media news_video">
                <div class="news_video_item active">

                <?php for ($a = 0; $a < count($data); ++$a) { 
                   
                    
                     if ($i == 1)
                     {
                        ?>
                        <div class="news_media_box clear">       
                        <div class="news_media_item news_media_item_big">
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="<?php echo $data[$a]['thumbnail'] ?>" alt="<?php echo $data[$a]['title'] ?>"/>
                                </div>
                                <div class="img img_mb">
                                    <img src="<?php echo $data[$a]['thumbnail2'] ?>" alt="<?php echo $data[$a]['title'] ?>"/>
                                </div>
                                <div class="play_btn" data-video-src="<?php echo $data[$a]['video_url'] ?>" data-title="<?php echo $data[$a]['title'] ?>">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p><?php echo $data[$a]['title'] ?></p>
                                </div>
                            </a>
                        </div>
                         
                         <?php   
                          if(($a+1)==count($data)){ ?>
                            
                            </div>
                           <?php 
                           }        
                         $i++;
                     }else{
                      
                        if($i == 2)
                        {
                           ?>
                             <div class="news_media_item news_media_item_small">
                           <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="<?php echo $data[$a]['thumbnail2'] ?>" alt="<?php echo $data[$a]['title'] ?>"/>
                                </div>
                               
                                <div class="play_btn" data-video-src="<?php echo $data[$a]['video_url'] ?>" data-title="<?php echo $data[$a]['title'] ?>">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p><?php echo $data[$a]['title'] ?></p>
                                </div>
                            </a>
                            

                            <?php 
                            if(($a+1)==count($data)){ ?>
                             </div>
                             </div>
                            <?php 
                            }    
                            $i++;
                        }
                       elseif ($i == 3)
                       {
                           ?>
                            <a class="wow fadeInUp">
                                <div class="img img_pc">
                                    <img src="<?php echo $data[$a]['thumbnail2'] ?>" alt="<?php echo $data[$a]['title'] ?>"/>
                                </div>
                               
                                <div class="play_btn" data-video-src="<?php echo $data[$a]['video_url'] ?>" data-title="<?php echo $data[$a]['title'] ?>">
                                    <img src="images/play.png"/>
                                </div>
                                <div class="txt">
                                    <p><?php echo $data[$a]['title'] ?></p>
                                </div>
                            </a>
                            </div>
                        </div>
                           <?php     
                           $i = 1;
                       }
                     }                    
                    ?>
                
                     
                  

                    <?php } ?>
                    
                    
                </div>
                <div class="news_video_item">
                <?php for ($a = 0; $a < count($data1); ++$a) { 
                   
                    
                   if ($j == 1)
                   {
                      ?>
<div class="news_media_box clear">       
                      <div class="news_media_item news_media_item_big">
                          <a class="wow fadeInUp">
                              <div class="img img_pc">
                                  <img src="<?php echo $data1[$a]['thumbnail'] ?>" alt="<?php echo $data1[$a]['title'] ?>"/>
                              </div>
                              <div class="img img_mb">
                                  <img src="<?php echo $data1[$a]['thumbnail2'] ?>" alt="<?php echo $data1[$a]['title'] ?>"/>
                              </div>
                              <div class="play_btn" data-video-src="<?php echo $data1[$a]['video_url'] ?>" data-title="<?php echo $data1[$a]['title'] ?>">
                                  <img src="images/play.png"/>
                              </div>
                              <div class="txt">
                                  <p><?php echo $data1[$a]['title'] ?></p>
                              </div>
                          </a>
                      </div>
                       
                       <?php   
                        if(($a+1)==count($data1)){ ?>
                          
                          </div>
                         <?php 
                         }        
                       $j++;
                   }else{
                    
                      if($j == 2)
                      {
                         ?>
                           <div class="news_media_item news_media_item_small">
                         <a class="wow fadeInUp">
                              <div class="img img_pc">
                                  <img src="<?php echo $data1[$a]['thumbnail2'] ?>" alt="<?php echo $data1[$a]['title'] ?>"/>
                              </div>
                          
                              <div class="play_btn" data-video-src="<?php echo $data1[$a]['video_url'] ?>" data-title="<?php echo $data1[$a]['title'] ?>">
                                  <img src="images/play.png"/>
                              </div>
                              <div class="txt">
                                  <p><?php echo $data1[$a]['title'] ?></p>
                              </div>
                          </a>
                          

                          <?php 
                          if(($a+1)==count($data1)){ ?>
                           </div>
                           </div>
                          <?php 
                          }    
                          $j++;
                      }
                     elseif ($j == 3)
                     {
                         ?>
                          <a class="wow fadeInUp">
                              <div class="img img_pc">
                                  <img src="<?php echo $data1[$a]['thumbnail2'] ?>" alt="<?php echo $data1[$a]['title'] ?>"/>
                              </div>
                             
                              <div class="play_btn" data-video-src="<?php echo $data1[$a]['video_url'] ?>" data-title="<?php echo $data1[$a]['title'] ?>">
                                  <img src="images/play.png"/>
                              </div>
                              <div class="txt">
                                  <p><?php echo $data1[$a]['title'] ?></p>
                              </div>
                          </a>
                          </div>
                      </div>
                         <?php     
                         $j = 1;
                     }

                   }
                
                  
                  ?>
              
                   
                

                  <?php } ?>
                    
                </div>
            </div>
        </div>
    </div>
<!--main end-->
<!-- <div id="youkuplayer"style="width:580px;height:326px"></div> -->


<!--video-->
<div class="zz"></div>
    <div class="video_box">
        <div class="video_box_title clear">
            <h4 id="videoshow">视频播放</h4>
            <a href="javascript:void(0);" class="video_close">×</a>
        </div>
        <div class="video_wrap" id="youkuplayer" style="height:550px;">
         
        </div>
    </div>
<!--video end-->
    </div>

    <?php require_once('includes/footer.php') ?>

<?php require_once('includes/scripts.php') ?>

<script type="text/javascript" src="//player.youku.com/jsapi"></script>
<script>

$('.news_video_item').each(function(){
        $(this).find('.news_media_box:odd').addClass('odd');
    });

    $('.play_btn').click(function(){
       var videoSrc=$(this).attr('data-video-src');
       var title=$(this).attr('data-title');
       $('.zz,.video_box').fadeIn(200);
    //    $('.video_wrap video').attr('src',videoSrc);
    //    $('.video_wrap video')[0].play();
   $("#videoshow").text(title);
        var player = new YKU.Player('youkuplayer',{
        styleid: '0',
        client_id: '6c97f129b630ded7',
        vid: videoSrc,
        newPlayer: true
        });


    });
    $('.video_close').click(function(){
        $('.zz,.video_box').fadeOut(100);
        $('.video_wrap video')[0].pause()
    });
    domTab('.news_video_item')
    
        $(document).ready(function() {
            $(".leftnav li:nth-of-type(4) a").addClass("active");
           $(".mainav li:nth-of-type(4) a").addClass("active");
           $(".subnav li:nth-of-type(2) a").addClass("active");
        });
    </script>
</body>
</html>