<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
use Models\UserRole;
use Models\Permission;
use Models\PermissionRole;

$group_id = 2;  
$user_id = $_SESSION['user_id'];
$role_ids = UserRole::select('role_id')->where('user_id',$user_id)->get()->toArray();


$per_ids = PermissionRole::select('permission_id')->whereIn('role_id',$role_ids)->get()->toArray();


$permissions = Permission::with(array('children' => function ($query) use ($per_ids){
    $query->where('active',1)->whereIn('id', $per_ids)->orderBy('importance', 'DESC')->get();
}))->where('active',1)->where('group_id', $group_id)
    ->whereIn('id',$per_ids)
    ->where('parent',0)
    ->orderBy('importance', 'DESC')->get();
//print_r($permissions);

$uri = $_SERVER['REQUEST_URI'];
$current_per = Permission::where('url', $uri)->first();
//print_r($current_per);
?>
<aside class="leftcol" id="leftcol">
    <div class="logo"><a href="index.html"><img src="<?php echo $site_info['logo'] ?>" alt="logo"></a></div>
   
    <nav id="menu">
          <ul class="mainmenu" id="mainmenu">
               
          <?php foreach($permissions as $item){ ?>
            <?php if($item->per_type == 1){ ?>
                <li>
                    <a href="<?php echo $item->url;?>">
                        <i class="iconfont <?php echo $item->icon;?>"></i> <?php echo $item->title;?>                
                    </a>
                </li>
            <?php }  ?>
            <?php if($item->per_type == 2){ ?>
                <li class="down-nav li<?php echo $item->id;?>  <?php echo (isset($current_per) && $current_per->parent == $item->id) ? 'nav-open':'';?>">
                    <a href="#">
                        <i class="iconfont <?php echo $item->icon;?>  "></i> <?php echo $item->title;?>  <i class="arrow iconfont icon-down"></i>
                    </a>
                    <?php if(isset($item->children)){ ?>
                        <ul class="submenu">
                        <?php foreach($item->children as $sub){ ?>
                            <li class="li<?php echo $sub->id;?>">
                                <a href="<?php echo $sub->url;?>" class="<?php echo (isset($current_per) && $current_per->id == $sub->id) ? 'active':'';?>">
                                    <?php echo $sub->title;?>
                                </a>
                            </li>
                        <?php } ?>
                        </ul>
                    <?php }  ?>                               
                </li>
            <?php }  ?>
            

        <?php } ?>
          <!--
                    <li class="general"><a href="/bbi-admin/views/config/general.php"><i class="iconfont icon-wrench"></i> 基本设置</a></li>
                    <li class="menus"><a href="/bbi-admin/views/menus/index.php"><i class="iconfont icon-menu"></i> 栏目</a></li>     
                    <li class="down-nav socials">
                        <a href="#">                      
                            <i class="iconfont icon-weibo"></i> 社交帐号<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="config"><a href="/bbi-admin/views/socials/softwares.php">社交类型</a></li>
                            <li class="accounts"><a href="/bbi-admin/views/socials/index.php">社交帐号</a></li>
                        </ul>
                    </li>     
                    <li class="down-nav language">
                        <a href="#">                      
                            <i class="iconfont icon-language"></i> 语言<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="config"><a href="/bbi-admin/views/languages/index.php">语言设置</a></li>
                            <li class="resource"><a href="/bbi-admin/views/resources/index.php">语言资源</a></li>
                        </ul>
                    </li>     
                    
                    <li class="down-nav emails">
                        <a href="#">                      
                            <i class="iconfont icon-mail-fill"></i> 邮件服务<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="config_smtp"><a href="/bbi-admin/views/config/config_smtp.php">邮件服务配置</a></li>
                            <li class="template"><a href="/bbi-admin/views/email_templates/index.php">邮件模板</a></li>
                        </ul>
                    </li>
                    <li class="down-nav security">
                        <a href="#">                      
                            <i class="iconfont icon-team"></i> 系统安全<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="users"><a href="/bbi-admin/views/users/index.php">用户</a></li>
                            <li class="roles"><a href="/bbi-admin/views/roles/index.php">角色</a></li>
                            <li class="permissions"><a href="/bbi-admin/views/permissions/index.php">模块配置</a></li>
                        </ul>
                    </li>     
                                                                 
                    <li class="sitemap"><a href="/bbi-admin/views/system/sitemap.php"><i class="iconfont icon-apartment"></i> <span class="nav-text">生成sitemap</span></a></li>

                    <li class="backup"><a href="/bbi-admin/views/system/backup.php"><i class="iconfont icon-database"></i> <span class="nav-text">备份数据库</span></a></li>
-->
                
                
                </ul>


            </nav>

            <div class="closemenu"><a href="#"><i class="iconfont icon-chevron-circle-left"></i></a></div>
         
    </aside>