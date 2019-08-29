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
$subnav = search($menutree, "title", "核医学");
//print_r($subnav)
?>


<div class="subnav">
    <div class="container-fluid">
    <nav class="row no-gutters">
        <?php if(isset($subnav)){
            $about_nav = $subnav[0]['children'];
            foreach($about_nav as $nav){
                ?>
            <div class="col-6 col-md">
                <a href="<?php echo $nav['url'];?>" class="<?php echo $_SERVER['REQUEST_URI']==$nav["url"]?"active":""; ?>"><?php echo $nav['title'];?></a>
            </div>
           <?php } ?>
        <?php } ?>
        <!-- <div class="col-6 col-md">
            <a href="/nuclear_medicine">核医学</a>
        </div>
        <div class="col-6 col-md">
            <a href="/nuclear_medicine/radioisotope">放射性同位素</a>
        </div>
        <div class="col-6 col-md">
            <a href="/nuclear_medicine/radiopharmaceutical">放射性药物</a>
        </div>
        <div class="col-6 col-md">
            <a href="/nuclear_medicine/radiation_production">放射药生产</a>
        </div> -->
       
    </nav>
    </div>
</div>