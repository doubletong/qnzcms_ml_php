<?php
    require_once("../../data/carousel.php");

    $carouselClass = new TZGCMS\Carousel();
    $carousels = $carouselClass->get_carousels('A003');

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

$subnav = search($menutree, "title", "投资者关系");

?>
    <!--banner-->
   
    <div class="banner banner-about" style="background-image:url('<?php echo isset($carousels[0])?$carousels[0]["image_url"]:""; ?>')">
        <div class="container">      
            <h1 class="title-page wow fadeInUp"><?php echo isset($carousels[0])?$carousels[0]["description"]:""; ?></h1> 
            <p class="wow fadeInUp"><?php echo isset($carousels[0])?$carousels[0]["title"]:""; ?></p>
        </div>
      
    </div>
    <!--banner end-->
    
<div class="subnav">
    <div class="container">
    <nav class="row no-gutters">
      
        <?php if(isset($subnav)){
            $about_nav = $subnav[0]['children'];
            foreach($about_nav as $nav){
                ?>
            <div class="col-6 col-md-3">
                <a href="<?php echo $nav['url'];?>" class="<?php echo $_SERVER['REQUEST_URI']===$nav["url"]?"active":""; ?>"><?php echo $nav['title'];?></a>
            </div>
           <?php } ?>
        <?php } ?>
        
     
    </nav>
    </div>
</div>