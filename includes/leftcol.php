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

$uri = $_SERVER['REQUEST_URI'];


?>

<aside class="leftcol" id="leftcol">

           
    <a href="/" class="logo"><img src="/assets/img/logo.png" alt="logo"/></a>


    <ul class="mainav">      
    <?php foreach( $menutree as $menu) { ?>                         
        <li>
            <a href="<?php echo $menu["url"]; ?>" class="<?php echo ((startsWith($_SERVER['REQUEST_URI'],$menu["url"])&&$menu["url"]!="/")||($_SERVER['REQUEST_URI'] == $menu["url"]))?"active":""; ?>"><?php echo $menu["title"]; ?> <span><?php echo $menu["description"]; ?></span></a>
        
        </li>
        
    <?php } ?>                   
    </ul>

   
   <div class="bot">
       <a href="/contact">
       <i class="iconfont icon-comment"></i>
    </a>
       <p class="p1">咨询热线：<?php echo $site_info['phone'];?> <br/>
总部地址：<?php echo $site_info['address'];?>
</p>
       <p class="copyright">
       版权所有&copy;天艺·优普森国际艺术教育
       </p>
   </div>
</aside>