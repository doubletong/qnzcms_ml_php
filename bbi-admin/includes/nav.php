<aside class="leftcol" id="leftcol">
    <div class="logo"><a href="index.html"><img src="<?php echo $site_info['logo'] ?>" alt="logo"></a></div>
   
    <nav id="menu">
          <ul class="mainmenu" id="mainmenu">
                    <li>
                        <a href="/bbi-admin/index.php">
                            <i class="iconfont icon-dashboard"></i> 控制面板                 
                        </a>
                    </li>
             

                 <!--  常规产品模块  -->
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
                        
                            <i class="iconfont icon-gift"></i> 活动事件<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="list"><a href="/bbi-admin/views/events/index.php?did=1">活动列表</a></li>
                            <li class="category"><a href="/bbi-admin/views/events/categories.php?did=1">分类</a></li>
                        </ul>
                    </li>
                    <!-- 
                    <li hidden>
                        <a href="orders.php">
                            <i class="iconfont icon-reconciliation"></i> <span class="nav-text">订单管理</span>                    
                        </a>
                    </li> -->
                    <!-- <li class="down-nav cases">
                        <a href="#">
                           
                            <i class="iconfont icon-percentage"></i> 应用案例<i class="arrow iconfont icon-down"></i>
                        </a>
                        <ul class="submenu">
                            <li><a href="/bbi-admin/views/cases/index.php">案例管理</a></li>
                            <li><a href="/bbi-admin/views/cases/case_categories.php">案例分类</a></li>
                        </ul>
                    </li>     -->
               
                 

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

                   <li class="exhibitions">
                        <a href="/bbi-admin/views/exhibitions/index.php">
                            <i class="iconfont  icon-deploymentunit"></i> <span class="nav-text">展会信息</span>                    
                        </a>
                    </li>
                  
                    <li class="chronicles">
                        <a href="/bbi-admin/views/chronicles/index.php" >
                            <i class="iconfont icon-reloadtime"></i> <span class="nav-text">发展历程</span>                    
                        </a>
                    </li>
                    <li class="annals">
                        <a href="/bbi-admin/views/annals/index.php" >
                            <i class="iconfont icon-trophy"></i> <span class="nav-text">荣誉资质</span>                    
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
                           <li class="list"><a href="/bbi-admin/views/teams/index.php">团队成员</a></li> 
                           <li class="categories"><a href="/bbi-admin/views/teams/categories.php">分类</a></li>                  
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

                   
                    <li class="links"><a href="/bbi-admin/views/links/index.php"><i class="iconfont icon-link"></i> 链接</a></li> 
           

                 
                </ul>


            </nav>

            <div class="closemenu"><a href="#"><i class="iconfont icon-chevron-circle-left"></i></a></div>
         
    </aside>