<?php 

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
$subnav = search($menutree, "title", "关于我们");
//print_r($subnav)
?>

<div class="subnav">
    <div class="container-fluid">
    <nav class="row no-gutters">
   
        <?php if(isset($subnav)){
            $about_nav = $subnav[0]['children'];
            foreach($about_nav as $nav){
                ?>
            <div class="col">
                <a href="<?php echo $nav['url'];?>" class="<?php echo (startsWith($_SERVER['REQUEST_URI'],$nav["url"]) || $_SERVER['REQUEST_URI']===$nav["url"])?"active":""; ?>"><?php echo $nav['title'];?></a>
            </div>
           <?php } ?>
        <?php } ?>       
     
    </nav>
    </div>
</div>