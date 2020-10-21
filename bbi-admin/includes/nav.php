<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/bbi-admin/includes/common.php');
use Models\UserRole;
use Models\Permission;
use Models\PermissionRole;

$group_id = 1;  
$user_id = $_SESSION['user_id'];

$role_ids = UserRole::where('user_id',$user_id)->pluck('role_id');
$per_ids = PermissionRole::whereIn('role_id',$role_ids)->pluck('permission_id');

$perm_for_nav = $_SESSION['my_permissions']->where('group_id', $group_id)->where('parent',0);
// Permission::with(array('children' => function ($query) use ($per_ids){
//     $query->where('active',1)->whereIn('id', $per_ids)->orderBy('importance', 'DESC')->get();
// }))->where('active',1)->where('group_id', 1)
//     ->whereIn('id',$per_ids)
//     ->where('parent',0)
//     ->orderBy('importance', 'DESC')->get();

//print_r($perm_for_nav);



?>
<aside class="leftcol" id="leftcol">
    <div class="logo"><a href="index.html"><img src="<?php echo $site_info['logo'] ?>" alt="logo"></a></div>
   
    <nav id="menu">
          <ul class="mainmenu" id="mainmenu">
                    <?php foreach($perm_for_nav as $item){ ?>
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
                   
             

                 <!--  常规产品模块  -->
                 <!-- 
                  <li>
                        <a href="/bbi-admin/index.php">
                            <i class="iconfont icon-dashboard"></i> 控制面板                 
                        </a>
                    </li>
                 <li class="down-nav products">
                        <a href="#">                                                       
                            <i class="iconfont icon-appstore"></i> 产品 <i class="arrow iconfont icon-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="list">
                                <a href="/bbi-admin/views/products/index.php">
                                    产品列表
                                </a>
                            </li>
                            <li class="category"><a href="/bbi-admin/views/products/categories.php">分类</a></li>
                        </ul>
                    </li> 
                    <li class="down-nav news">
                        <a href="#">
                            <i class="iconfont icon-file-copy"></i> 文章<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="list"><a href="/bbi-admin/views/news/index.php?did=1">文章列表</a></li>
                            <li class="category"><a href="/bbi-admin/views/news/categories.php?did=1">分类</a></li>
                        </ul>
                    </li>

                    <li class="down-nav events">
                        <a href="#">                        
                            <i class="iconfont icon-gift"></i> 活动会议<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="list"><a href="/bbi-admin/views/events/index.php?did=1">会议列表</a></li>
                            <li class="category"><a href="/bbi-admin/views/events/categories.php?did=1">分类</a></li>
                        </ul>
                    </li>

                    
                    <li hidden>
                        <a href="orders.php">
                            <i class="iconfont icon-reconciliation"></i> <span class="nav-text">订单管理</span>                    
                        </a>
                    </li>
                    <li class="down-nav cases">
                        <a href="#">
                           
                            <i class="iconfont icon-percentage"></i> 应用案例<i class="arrow iconfont icon-down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="/bbi-admin/views/cases/index.php">案例管理</a></li>
                            <li><a href="/bbi-admin/views/cases/case_categories.php">案例分类</a></li>
                        </ul>
                    </li>                    
                 

                   <li class="applications">
                        <a href="/bbi-admin/views/applications/index.php">
                            <i class="iconfont icon-deploymentunit"></i> 应用领域                 
                        </a>
                    </li> 

                    <li class="services">
                        <a href="/bbi-admin/views/services/index.php">
                            <i class="iconfont icon-windows"></i> <span class="nav-text">服务项目</span>                    
                        </a>
                    </li> 
                    

                    <li class="down-nav faq">
                        <a href="#">                         
                            <i class="iconfont icon-question-circle-fill"></i> 常见问题<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="list"><a href="/bbi-admin/views/questions/index.php">问题列表</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/questions/categories.php">分类</a></li>                  
                       </ul>                        
                    </li>
                    <li class="papers">
                        <a href="/bbi-admin/views/papers/index.php">
                            <i class="iconfont  icon-file"></i> 论文                
                        </a>
                    </li>
                    <li class="researches">
                        <a href="/bbi-admin/views/researches/index.php">
                            <i class="iconfont  icon-school"></i> 研究中心                 
                        </a>
                    </li>
                    <li class="labs">
                        <a href="/bbi-admin/views/labs/index.php">
                            <i class="iconfont  icon-reddit"></i> 实验室           
                        </a>
                    </li>

                
                  
                    <li hidden>
                        <a href="subscriptions.php">
                            <i class="iconfont icon-mail"></i> <span class="nav-text">邮件订阅</span>                    
                        </a>
                    </li>
                  
                    <li class="pages">
                        <a href="/bbi-admin/views/pages/index.php">
                            <i class="iconfont icon-file"></i> <span class="nav-text">页面</span>                    
                        </a>
                    </li>
               
                    <li class="down-nav teams">
                        <a href="#">                         
                            <i class="iconfont icon-team"></i> 团队<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="list"><a href="/bbi-admin/views/teams/index.php">人员管理</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/teams/categories.php">职位分类</a></li>
                         <li class="organizations"><a href="/bbi-admin/views/teams/organizations.php">组织团体</a></li>
                       </ul>                        
                    </li>

                    <li class="jobs">
                        <a href="/bbi-admin/views/jobs/index.php">
                            <i class="iconfont icon-user"></i> <span class="nav-text">岗位招聘</span>                    
                        </a>
                    </li>
                   <li class="agent" hidden>
                        <a href="/bbi-admin/distributors.php">
                            <i class="iconfont icon-heatmap"></i> <span class="nav-text">经销售信息</span>                    
                        </a>
                    </li>
               

                    <li class="down-nav videos">
                        <a href="#">                         
                            <i class="iconfont icon-video"></i> 视频<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="list"><a href="/bbi-admin/views/videos/index.php">列表</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/videos/categories.php">分类</a></li>                  
                       </ul>                        
                    </li>

                    <li class="down-nav albums">
                        <a href="#">                         
                            <i class="iconfont icon-image"></i> 相册<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="photos"><a href="/bbi-admin/views/albums/photos.php">图片列表</a></li> 
                           <li class="list"><a href="/bbi-admin/views/albums/index.php">相册集</a></li>                  
                       </ul>                        
                    </li>

                   <li class="down-nav downloads">
                        <a href="#">                         
                            <i class="iconfont icon-download"></i> 下载中心<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="list"><a href="/bbi-admin/views/downloads/index.php">下载列表</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/downloads/categories.php">分类</a></li>                  
                       </ul>                        
                    </li>
                    <li class="down-nav carousels">
                        <a href="#">                         
                            <i class="iconfont icon-image"></i> 广告管理<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="ads"><a href="/bbi-admin/views/carousels/index.php">广告</a></li> 
                           <li class="position"><a href="/bbi-admin/views/carousels/positions.php">广告位</a></li>                     
                       </ul>                        
                    </li>

                    <li class="down-nav links">
                        <a href="#">                         
                            <i class="iconfont icon-link"></i> 链接<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                           <li class="list"><a href="/bbi-admin/views/links/index.php">列表</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/links/categories.php">分类</a></li>                  
                       </ul>                        
                    </li>
                  -->
                 
                </ul>


            </nav>

            <div class="closemenu"><a href="#"><i class="iconfont icon-chevron-circle-left"></i></a></div>
         
    </aside>