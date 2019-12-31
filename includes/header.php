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
    <div class="container-fluid">   
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="/" class="logo"><img id="logo" src="/assets/img/logo.png" alt="<?php echo $site_info['sitename']; ?>"></a>
                </div>
                <div class="col">
                    <div class="topnav">
                        <a href="/jobs">招贤纳士</a>
                        <a href="#">商务入口</a>
                        <a href="#">简体中文</a>
                    </div>
            
                    <ul class="mainav" id="mainav">
                        <?php foreach ($menutree as $menu) { ?>
                            <li class="<?php echo (startsWith($uri, $menu["url"]) && $menu["url"] != "/") || $uri == $menu["url"] ? "active" : ""; ?>">
                                <a href="<?php echo $menu["url"]; ?>" class="<?php echo isset($menu['children']) ? 'down' : ''; ?>" data-id="nav<?php echo $menu["id"]; ?>"><?php echo $menu["title"]; ?></a>
                            </li>
                        <?php } ?>
                        <li class="last"><a href="/search"><i class="iconfont icon-search"></i></a></li>
                    </ul>

                </div>
                <!-- <div class="col-auto searchicon">
                    <a href="/search"><i class="iconfont icon-search"></i></a>
                </div>
              
                <div class="col-auto menu-col">
                    <div class="menu-toggle">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>
                </div> -->
            </div>
        </div>

    <?php foreach ($menutree as $menu) { ?>
        <div class="menu-over" id="nav<?php echo $menu["id"]; ?>">
            <div class="container">
                <div class="row">
                    <?php if (isset($menu['children'])) { ?>
                        <?php if ($menu['id'] == 13) { ?>
                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m < 5) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>
                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m == 5) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                        <?php if (isset($subMenuModel['children'])) { ?>
                                            <ul>
                                                <?php foreach ($subMenuModel['children'] as $subThreeModel) { ?>
                                                    <li class="<?php echo $n > 8 ? "hidden" : ""; ?>"><a href="<?php echo $subThreeModel["url"]; ?>" class="<?php echo $uri === $subThreeModel["url"] ? "active" : ""; ?>"><?php echo $subThreeModel["title"]; ?></a></li>

                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>
                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m == 6) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>

                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>
                        <?php } elseif ($menu['id'] == 18) { ?>

                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m < 5) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>
                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m < 10 && $m >= 5) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>
                            <div class="col-lg-2">
                                <?php $m = 0; ?>
                                <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                    <?php if ($m == 10) { ?>
                                        <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                        <?php if (isset($subMenuModel['children'])) { ?>
                                            <ul>
                                                <?php foreach ($subMenuModel['children'] as $subThreeModel) { ?>
                                                    <li class="<?php echo $n > 8 ? "hidden" : ""; ?>"><a href="<?php echo $subThreeModel["url"]; ?>" class="<?php echo $uri === $subThreeModel["url"] ? "active" : ""; ?>"><?php echo $subThreeModel["title"]; ?></a></li>

                                                <?php } ?>
                                            </ul>
                                        <?php } ?>
                                    <?php } ?>
                                    <?php $m++; ?>
                                <?php } ?>
                            </div>


                        <?php } else { ?>

                            <?php foreach ($menu['children'] as $subMenuModel) { ?>
                                <div class="col-lg-2">
                                    <h3><a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a></h3>
                                    <?php if (isset($subMenuModel['children'])) { ?>
                                        <?php $n = 1; ?>
                                        <ul>
                                            <?php foreach ($subMenuModel['children'] as $subThreeModel) { ?>
                                                <li class="<?php echo $n > 8 ? "hidden" : ""; ?>"><a href="<?php echo $subThreeModel["url"]; ?>" class="<?php echo $uri === $subThreeModel["url"] ? "active" : ""; ?>"><?php echo $subThreeModel["title"]; ?></a></li>

                                                <?php $n++; ?>
                                            <?php } ?>
                                        </ul>
                                        <?php if ($n > 9) { ?>
                                            <a class="more" href="javascript:void(0);">更多 &gt;</a>
                                        <?php  } ?>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div id="overmenu" class="overmenu">
        <ul class="mobilemainav">
            <?php foreach ($menutree as $model) { ?>

                <li>
                    <a href="<?php echo $model["url"]; ?>"><?php echo $model["title"]; ?></a>
                    <?php if (isset($model['children'])) { ?>
                        <ul>
                            <?php foreach ($model['children'] as $subMenuModel) { ?>
                                <li>
                                    <a href="<?php echo $subMenuModel["url"]; ?>" class="<?php echo $uri === $subMenuModel["url"] ? "active" : ""; ?>"><?php echo $subMenuModel["title"]; ?></a>
                                    <?php if (isset($subMenuModel['children'])) { ?>
                                        <ul>
                                            <?php foreach ($subMenuModel['children'] as $lastModel) { ?>
                                                <li>
                                                    <a href="<?php echo $lastModel["url"]; ?>" class="<?php echo $uri === $lastModel["url"] ? "active" : ""; ?>"><?php echo $lastModel["title"]; ?></a>

                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
            <?php
            } ?>

        </ul>
    </div>
</header>