<?php
    require_once("../../data/carousel.php");

    $carouselClass = new TZGCMS\Carousel();
    $carousels = $carouselClass->get_carousels('A002');

    function search($array, $key, $value) 
    { 
        $results = array(); 
        if (is_array($array)) 
        { 
            if (isset($array[$key]) && $array[$key] == $value) 
                $results[] = $array; 
            foreach ($array as $subarray) 
                $results = array_merge($results, search($subarray, $key, $value)); 
        } 
        return $results; 
    } 

$subnav = search($menutree, "title", "关于三达");

?>
    <!--banner-->
   
    <div class="banner banner-about" style="background-image:url('<?php echo isset($carousels[0])?$carousels[0]["image_url"]:""; ?>')">
        <div class="container">      
                <h1 class="title-page wow fadeInLeft"><?php echo isset($carousels[0])?$carousels[0]["title"]:""; ?></h1> 
        </div>
        <img src="/img/c.png" alt="" class="circle">
    </div>
    <!--banner end-->
    
<div class="subnav">
    <div class="container">
    <nav class="row no-gutters">
      
        <?php if(isset($subnav)){
            $about_nav = $subnav[0]['children'];
            foreach($about_nav as $nav){
                ?>
            <div class="col-4 col-md">
                <a href="<?php echo $nav['url'];?>" class="<?php echo $_SERVER['REQUEST_URI']===$nav["url"]?"active":""; ?>"><?php echo $nav['title'];?></a>
            </div>
           <?php } ?>
        <?php } ?>
        
     
    </nav>
    </div>
</div>