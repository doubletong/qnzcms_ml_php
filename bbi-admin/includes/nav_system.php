<aside class="leftcol" id="leftcol">
    <div class="logo"><a href="index.html"><img src="<?php echo $site_info['logo'] ?>" alt="logo"></a></div>
   
    <nav id="menu">
          <ul class="mainmenu" id="mainmenu">
                  
                    <li class="general"><a href="/bbi-admin/views/config/general.php"><i class="iconfont icon-wrench"></i><span class="nav-text">基本设置</span></a></li>
                    <li class="menus"><a href="/bbi-admin/views/menus/index.php"><i class="iconfont icon-menu"></i> <span class="nav-text">栏目</span></a></li>     

                    <li class="down-nav language">
                        <a href="#">                      
                            <i class="iconfont icon-language"></i> 语言<i class="arrow iconfont icon-down"></i>
                        </a>
                       <ul class="submenu">
                            <li class="config_smtp"><a href="/bbi-admin/views/languages/index.php">语言设置</a></li>
                            <li class="template"><a href="/bbi-admin/views/resources/index.php">语言资源</a></li>
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
                    <li class="users"><a href="/bbi-admin/views/users/index.php"><i class="iconfont icon-team"></i> <span class="nav-text">帐号</span></a></li>                                               
                    <li class="sitemap"><a href="/bbi-admin/views/system/sitemap.php"><i class="iconfont icon-apartment"></i> <span class="nav-text">生成sitemap</span></a></li>

                    <li class="backup"><a href="/bbi-admin/views/system/backup.php"><i class="iconfont icon-database"></i> <span class="nav-text">备份数据库</span></a></li>
                </ul>


            </nav>

            <div class="closemenu"><a href="#"><i class="iconfont icon-chevron-circle-left"></i></a></div>
         
    </aside>