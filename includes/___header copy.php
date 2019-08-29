<?php
require_once($_SERVER['DOCUMENT_ROOT']."/data/menu.php");

$menuClass = new Menu();
$menus = $menuClass->get_all_menu(32);
$menus_bot = $menuClass->get_all_menu(40);

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
            <div class="col-auto">
                <a href="/" class="logo">
                    
                </a>
            </div>
            <div class="col pcmainav">
                <ul class="mainav">      
                <?php foreach( $menutree as $menu)
                        {
                            ?>                         
                            <li class="<?php echo isset($menu['children'])?'down':'';?>"><a href="<?php echo $menu["url"]; ?>"><?php echo $menu["title"]; ?></a>
                            <?php if(isset($menu['children'])){ ?>
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
           
            <div class="col-auto langs">
                <a href="#">EN</a>
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

                            <?php if(isset($model['children'])){ ?>
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