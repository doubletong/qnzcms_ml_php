<?php
require_once("includes/common.php");
require_once("config/db.php");
require_once("data/menu.php");
$menuClass = new Menu();
$menus = $menuClass->get_all_menu(32);

function buildMenuTree(array $elements, $parentId = 0)
{
    $branch = array();

    foreach ($elements as $element) {
        if ($element['parent_id'] == $parentId) {
            $children = buildMenuTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
        }
    }

    return $branch;
}

$menutree = buildMenuTree($menus);
?>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="row row-main align-items-center">
            <div class="col">
                <a href="/" class="logo">
                    <img srcset="/img/logo@2x.png 2x,/img/logo.png 1x" src="/img/logo.png" alt="logo">
                </a>
            </div>
            <div class="col-auto pcmainav">
                <ul class="mainav">      
                <?php foreach( $menutree as $menu)
                        {
                            ?>
                         
                            <li class="<?php echo $menu['children']?'down':'';?>"><a href="javascript:void(0);"><?php echo $menu["title"]; ?></a>

                            <?php if($menu['children']){ ?>
                                <ul class="subnav">
                            <?php
                                foreach( $menu['children'] as $subMenuModel){
                            ?>
                             
                                <li><a href="<?php echo $subMenuModel["url"]; ?>"><?php echo $subMenuModel["title"]; ?></a></li>
                            <?php } ?>
                            </ul>
                            <?php
                    }
                    } ?>                                                           
                
                   
                </ul>

               
            </div>
            <div class="col-auto search">
            <a href="javascript:void(0);" id="btnSearch"><i class="iconfont icon-search"></i></a>
                </div>
            <div class="col-auto langs">
            <a href="http://2019test.microport.com.cn/">中文</a>/<a href="http://2019testen.microport.com.cn/">EN</a>
            </div>
        
                <div class="col-auto menu-col">               
                    <div class="menu-toggle">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>
                </div>
        </div>

        <div id="searchbox" class="searchbox">
            <form action="/search" method="get">
                <div class="row">
                    <div class="col">
                        <input type="search" name="keyword" id="keyword" placeholder="请输入您想搜索的内容" />
                    </div>
                    <div class="col-auto">
                        <button type="submit"><i class="iconfont icon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="overmenu" class="overmenu">
    <ul class="mainav">  
                    <?php foreach( $menutree as $model)
                        {
                            ?>
                         
                            <li class="<?php echo $model['children']?'down':'';?>"><a href="javascript:void(0);"><?php echo $model["title"]; ?></a>

                            <?php if($model['children']){ ?>
                                <ul class="subnav">
                            <?php
                                foreach( $model['children'] as $subModel){
                            ?>
                             
                                <li><a href="<?php echo $subModel["url"]; ?>"><?php echo $subModel["title"]; ?></a></li>
                            <?php } ?>
                            </ul>
                            <?php
                    }
                    } ?>                                     
                   
        
                </ul>
    </div>
</header>