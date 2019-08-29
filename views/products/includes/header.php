<?php
    require_once("../../data/carousel.php");

    $carouselClass = new TZGCMS\Carousel();
    $carousels = $carouselClass->get_carousels('A004');

?>
    <!--banner-->   
    <div class="banner banner-about" style="background-image:url('<?php echo isset($carousels[0])?$carousels[0]["image_url"]:""; ?>')">
        <div class="container">
            <div class="title-page">
                <h1 class="wow fadeInLeft"><?php echo isset($carousels[0])?$carousels[0]["title"]:""; ?></h1>
                <p class="wow fadeInLeft"><?php echo isset($carousels[0])?$carousels[0]["description"]:""; ?></p>
            </div>
        </div>
        <img src="/img/c.png" alt="" class="circle">
    </div>
    <!--banner end-->
    
  