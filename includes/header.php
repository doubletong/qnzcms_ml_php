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
        <div class="row topcol no-gutters align-items-center">
            <div class="col-auto">
                <a href="/" class="logo"><img src="/assets/img/logo.png" alt="<?php echo $site_info['sitename']; ?>"></a>
            </div>
            <div class="col-auto">
                <div class="biaoyu">
                    <p class="p1">2000场活动案例，10年行业经验</p>
                    <p class="p2">一站式演出设备租赁服务商</p>
                </div>
            </div>
            <div class="col">
                <div id="searchbox" class="searchbox">
                    <form action="/search" method="get">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <input type="search" name="keyword" id="keyword" />
                            </div>
                            <div class="col-auto">
                                <button type="submit"><i class="iconfont icon-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="contact">
                    <div class="mobile">138-8888 8888</div>
                    <div class="by">超10年行业经验的服务专员为您服务</div>
                </div>
            </div>
        </div>


    </div>
    <div class="mainav-container">
        <div class="container">

           
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