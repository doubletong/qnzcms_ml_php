<?php
    require_once("../../data/carousel.php");

    $carouselClass = new TZGCMS\Carousel();
    $carousels = $carouselClass->get_carousels('A009');

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



?>
    <!--banner-->
   
    <div class="banner banner-about" style="background-image:url('<?php echo isset($carousels[0])?$carousels[0]["image_url"]:""; ?>')">
        <div class="container">      
            <h1 class="title-page wow fadeInUp"><?php echo isset($carousels[0])?$carousels[0]["description"]:""; ?></h1> 
            <p class="wow fadeInUp"><?php echo isset($carousels[0])?$carousels[0]["title"]:""; ?></p>
        </div>
        <img src="/img/c.png" alt="" class="circle">
    </div>
    <!--banner end-->
    
