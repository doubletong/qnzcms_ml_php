<?php 

function listFolderFiles($dir){
    $ffs = scandir($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    echo '<ul class="file_list">';
    foreach($ffs as $ff){
        if(is_dir($dir.'/'.$ff)){
            echo '<li class="dir"><a href="#"><i class="iconfont icon-folder"></i> '.$ff.'</a>';
               listFolderFiles($dir.'/'.$ff);
            echo '</li>';
        }
       
    }
    foreach($ffs as $ff){
        if(!is_dir($dir.'/'.$ff)){        
            echo '<li class="file"><a href="'.$dir.'/'.$ff.'"><i class="iconfont icon-file"></i> '.$ff.'</a></li>';
        }
       
    }
    echo '</ul>';
}



?>

<aside class="leftcol" id="leftcol">
    <div class="logo"><a href="index.html"><img src="<?php echo $site_info['logo'] ?>" alt="logo"></a></div>
   
    <nav id="menu">
          <?php listFolderFiles($_SERVER['DOCUMENT_ROOT'].'/assets/templates');?>


    </nav>

    <div class="closemenu"><a href="#"><i class="iconfont icon-chevron-circle-left"></i></a></div>
         
</aside>