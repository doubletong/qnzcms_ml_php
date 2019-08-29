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
$subnav = search($menutree, "title", "职业发展");
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
                <a href="<?php echo $nav['url'];?>" class="<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH)==$nav["url"]?"active":""; ?>"><?php echo $nav['title'];?></a>
            </div>
           <?php } ?>
        <?php } ?>

        <!-- <div class="col">
            <a href="/career">企业文化</a>
        </div>
        <div class="col">
            <a href="/career/salary_and_welfare">薪资福利</a>
        </div>
        <div class="col">
            <a href="/career/jobs">招聘岗位</a>
        </div> -->
      
    </nav>
    </div>
</div>