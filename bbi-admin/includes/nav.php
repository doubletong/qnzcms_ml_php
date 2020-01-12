<aside id="sidebar-nav" class="leftcol bg-dark">
    <div class="logo text-center">
        <img src="<?php echo $site_info['logo'] ?>" alt="logo" />
    </div>

        <nav id="menu"> 
            <ul class="list-unstyled mainmenu">
                    <li>
                        <a href="/bbi-admin/index.php">
                            <i class="iconfont icon-dashboard"></i> <span class="nav-text">控制面板</span>                        
                        </a>
                    </li>
                    <!--  常规产品模块  -->
                    <!-- <li class="down-nav products">
                        <a href="#">
                            <i class="iconfont icon-left   float-right"></i>                             
                            <i class="iconfont icon-appstore"></i> <span class="nav-text">产品</span>
                        </a>
                        <ul class="subnav">
                            <li class="list">
                                <a href="/bbi-admin/views/products/index.php">
                                    产品列表
                                </a>
                            </li>
                            <li class="category"><a href="/bbi-admin/views/products/product_categories.php">分类</a></li>
                        </ul>
                    </li>  -->

                 <!--  自定义产品属性产品模块  -->
                 <li class="down-nav products_v1">
                        <a href="#">
                            <i class="iconfont icon-left   float-right"></i>                             
                            <i class="iconfont icon-appstore"></i> <span class="nav-text">产品</span>
                        </a>
                        <ul class="subnav">
                            <li class="list">
                                <a href="/bbi-admin/views/products_v1/index.php">
                                    产品列表
                                </a>
                            </li>
                            <li class="category"><a href="/bbi-admin/views/products_v1/categories.php">分类</a></li>
                        </ul>
                    </li> 
                 
                    <!-- 
                    <li hidden>
                        <a href="orders.php">
                            <i class="iconfont icon-reconciliation"></i> <span class="nav-text">订单管理</span>                    
                        </a>
                    </li> -->
                    <li class="down-nav cases">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-percentage"></i> <span class="nav-text">应用案例</span> 
                        </a>
                        <ul class="subnav">
                            <li><a href="/bbi-admin/views/cases/index.php">案例管理</a></li>
                            <li><a href="/bbi-admin/views/cases/case_categories.php">案例分类</a></li>
                        </ul>
                    </li>    
                    <!--  
                    <li class="down-nav tech">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-experiment"></i> <span class="nav-text">核心技术</span> 
                        </a>
                        <ul class="subnav">
                            <li><a href="/bbi-admin/views/articles/index.php?did=3">文章列表</a></li>
                            <li><a href="/bbi-admin/views/articles/article_categories.php?did=3">分类</a></li>
                        </ul>
                    </li>
                    -->
                    <li class="down-nav articles">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-file-copy"></i> <span class="nav-text">新闻资讯</span> 
                        </a>
                        <ul class="subnav">
                            <li><a href="/bbi-admin/views/articles/index.php?did=1">文章列表</a></li>
                            <li><a href="/bbi-admin/views/articles/article_categories.php?did=1">分类</a></li>
                        </ul>
                    </li>

                    <li class="applications">
                        <a href="/bbi-admin/views/applications/index.php">
                            <i class="iconfont icon-deploymentunit"></i> <span class="nav-text">应用领域</span>                    
                        </a>
                    </li>

                   <li class="down-nav majors">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-windows"></i> <span class="nav-text">专业介绍</span> 
                        </a>
                        <ul class="subnav">
                            <li><a href="/bbi-admin/views/majors/index.php">专业项目</a></li>
                            <li class="category"><a href="/bbi-admin/views/majors/categories.php">分类</a></li>
                        </ul>
                    </li>     
                    <li class="down-nav schools">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-school"></i> <span class="nav-text">院校管理</span> 
                        </a>
                        <ul class="subnav">
                            <li><a href="/bbi-admin/views/schools/index.php">院校列表</a></li>
                            <li class="category"><a href="/bbi-admin/views/schools/countries.php">国家</a></li>
                        </ul>
                    </li>     
                    <li class="offers">
                        <a href="/bbi-admin/views/offers/index.php">
                            <i class="iconfont icon-aliwangwang"></i> <span class="nav-text">学员Offer</span>                    
                        </a>
                    </li>
                  
                    <li class="fqa" hidden>
                        <a href="/bbi-admin/questions.php">
                            <i class="iconfont icon-question-circle-fill"></i> <span class="nav-text">常见问题</span>                    
                        </a>
                    </li>
                   <li hidden>
                        <a href="meetings.php">
                            <i class="iconfont  icon-deploymentunit"></i> <span class="nav-text">会议信息</span>                    
                        </a>
                    </li>
                    <!-- <li class="down-nav" hidden>
                        <a href="#">
                            <i class="iconfont icon-left   float-right"></i>                             
                            <i class="iconfont icon-camera"></i> <span class="nav-text">媒体关注</span>
                        </a>
                        <ul class="subnav">
                            <li>
                                <a href="media.php">
                                    媒体关注链接
                                </a>
                            </li>
                            <li>
                                <a href="topics.php">
                                   主题管理
                                </a>
                            </li>
                        </ul>
                    </li> -->
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
                   <li>
                        <a href="cases.php">
                            <i class="iconfont icon-antdesign"></i> <span class="nav-text">解决方案</span>                    
                        </a>
                    </li>
                    <li class="pages">
                        <a href="/bbi-admin/views/pages/index.php">
                            <i class="iconfont icon-file"></i> <span class="nav-text">页面</span>                    
                        </a>
                    </li>
               
                   
                    <li class="teams">
                        <a href="/bbi-admin/views/teams/index.php">
                            <i class="iconfont icon-team"></i> <span class="nav-text">团队管理</span>                    
                        </a>
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
                    <li hidden>
                        <a href="/bbi-admin/videos.php">
                            <i class="iconfont icon-video"></i> <span class="nav-text">视频中心</span>                    
                        </a>
                    </li>
                    <li class="downloads" hidden>
                        <a href="/bbi-admin/documents.php">
                            <i class="iconfont icon-download"></i> <span class="nav-text">下载中心</span>                    
                        </a>
                    </li>
                    <li class="down-nav carousels">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-image"></i> <span class="nav-text">广告管理</span> 
                        </a>
                        <ul class="subnav">
                           <li class="ads"><a href="/bbi-admin/views/carousels/index.php">广告</a></li> 
                           <li class="position"><a href="/bbi-admin/views/carousels/positions.php">广告位</a></li>                       
                  
                       </ul>
                        
                    </li>

                    <li class="down-nav plugins">
                        <a href="#">
                            <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-api"></i> <span class="nav-text">组件</span> 
                        </a>
                        <ul class="subnav">                           
                            <li class="menus"><a href="/bbi-admin/views/menus/index.php"><i class="iconfont icon-menu"></i>栏目</a></li>              
                            <li class="links"><a href="/bbi-admin/views/links/index.php"><i class="iconfont icon-link"></i> 链接</a></li>                   
                        </ul>
                    </li>

                    <li class="down-nav system">
                        <a href="#">
                        <i class="iconfont icon-left float-right"></i>   
                            <i class="iconfont icon-setting"></i>  <span class="nav-text">系统</span> </a>
                            <ul class="subnav">
                            <li class="general"><a href="/bbi-admin/views/config/general.php"><i class="iconfont icon-wrench"></i> 基本设置</a></li>
                            <li class="manager"><a href="/bbi-admin/administrators.php"><i class="iconfont icon-team"></i> 管理员</a></li>
                            <li class="manager_add"><a href="/bbi-admin/admin_add.php"><i class="iconfont icon-adduser"></i> 创建管理员</a></li>
                            <li class="config_smtp"><a href="/bbi-admin/views/config/config_smtp.php"><i class="iconfont icon-mail-fill"></i> 邮件服务配置</a></li>
                            <li class="backup"><a href="/bbi-admin/views/backup/index.php"><i class="iconfont icon-database"></i> 备份数据库</a></li>
                        </ul>
                    </li>
                </ul>


            </nav>

            <div class="closemenu">
                <a href="#"><i class="iconfont icon-doubleleft"></i></a>
            </div>
         
    </aside>