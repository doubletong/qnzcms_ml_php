<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/data/menu.php");

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
$uri = $_SERVER['REQUEST_URI'];

?>

<header class="site-header" id="site-header">
    <div class="container">
        <div class="row topcol no-gutters align-items-end">
            <div class="col-auto">
                <a href="/" class="logo"><img id="logo" src="/assets/img/logo.png" alt="<?php echo $site_info['sitename']; ?>"></a>
            </div>
            <div class="col">            
               <div class="topcol">
                   <div class="row">
                       <div class="col">
                        <div id="searchbox" class="searchbox">
                                <form action="/search" method="get">
                                    <div class="row no-gutters align-items-center">
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
                       <div class="col-auto">
                           <a href="#">EN</a>
                       </div>
                   </div>
               </div>
               
               <div class="row no-gutters align-items-center">
                   <div class="col">
                        <ul class="mainav">
                            <?php foreach ($menutree as $menu) { ?>
                                <li class="<?php echo isset($menu['children']) ? 'down' : ''; ?> <?php echo (startsWith($uri,$menu["url"]) && $menu["url"] != "/") || $uri == $menu["url"] ? "active" : ""; ?>">
                                    <a href="<?php echo $menu["url"]; ?>"><?php echo $menu["title"]; ?></a>
                                    <?php if (isset($menu['children'])) { ?>
                                        <dl>
                                            <?php
                                                    foreach ($menu['children'] as $subMenuModel) {
                                                        ?>
                                                <dd><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></dd>
                                            <?php } ?>
                                        </dl>
                                    <?php } ?>
                                </li>

                            <?php } ?>
                        </ul>
                   </div>
                   <div class="col-auto sj">
                       <div class="shejiao">
                           <a href="#">
                               <i class="iconfont icon-wechat"></i>                         
                           </a>
                           <a href="#">
                               <i class="iconfont icon-qq"></i>                         
                           </a>
                           <a href="#">
                               <i class="iconfont icon-phone"></i>                         
                           </a>
                           <a href="#">
                               <i class="iconfont icon-youxiang"></i>                         
                           </a>
                       </div>
                   </div>
               </div>
                
            </div>
          
        </div>


    </div>


    <!-- <div class="col-auto menu-col">
            <div class="menu-toggle">
                <div class="one"></div>
                <div class="two"></div>
                <div class="three"></div>
            </div>
        </div> -->
    <div id="overmenu" class="overmenu">
        <ul class="mainav">
            <?php foreach ($menutree as $model) {
                ?>
                <li><a href="<?php echo $model["url"]; ?>"><?php echo $model["title"]; ?></a></li>
            <?php
            } ?>

        </ul>
    </div>
</header>