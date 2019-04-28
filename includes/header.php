<header class="site-header" id="site-header">
        <div class="container">
            <div class="row">
                <div class="col-auto">
                    <a href="/" class="logo">
                        <picture>
                            <source media="(min-width: 992px)" srcset="/img/logo.png">
                            <img src="/img/min-logo.png" alt="logo">
                        </picture>
                    </a>
                </div>
                <div class="col text-right">
                    <div class="topcol">
                     
                            <div class="row">
                                <div class="col leftcol">                              
                                    <ul class="social">
                                        <li>
                                            <a href="https://m.weibo.cn/u/6917524030"><i class="iconfont icon-sina"></i></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="weixincode"><i class="iconfont icon-weixin"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://www.linkedin.com/company/crmedicon/" target="_blank"><i class="iconfont icon-linkedin"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-auto">
                                <a href="http://www.crmedicon.com">中文</a>/<a href="http://en.crmedicon.com">EN</a>
                                </div>
                            </div>
                       
                    </div>

                    <nav id="mainav" class="mainav">
                        <ul>
                            <li><a href="/">首页</a></li>
                            <li><a href="/about">关于我们</a>
                                <dl class="subnav">                          
                                    <dd><a href="/about">公司简介</a></dd>                             
                                    <dd><a href="/team">核心团队</a></dd>
                                    <dd><a href="/advisor">专家顾问</a></dd>
                                    <dd><a href="/superiority">我们的优势</a></dd>                             
                                </dl>
                            </li>
                            <li><a href="/laws">服务平台</a>
                                <dl class="subnav">     
                                    <dd><a href="/laws">法规注册</a></dd>
                                    <dd><a href="/medicine">医学事务</a></dd>
                                    <dd><a href="/clinical">临床监查和项目管理</a></dd>
                                    <dd><a href="/trials">医疗器械临床试验</a></dd>
                                    <dd><a href="/statistics">数据管理和统计分析</a></dd>
                                    <dd><a href="/biologic">生物样本分析</a></dd>         
                                    <dd><a href="/pharmacovigilance">药物警戒</a></dd>           
                                    <dd><a href="/train">专业培训</a></dd>
                                </dl>
                            </li>
                            <!-- <li><a href="experience">经验领域</a></li> -->
                            <li><a href="/strategy">解决方案</a>
                                <dl class="subnav">                      
                                    <dd><a href="/strategy">新药临床开发策略</a></dd>
                                    <dd><a href="/declare">中美双报</a></dd>
                                    <dd><a href="/development">新药早期临床研究</a></dd>
                                    <dd><a href="/experiment">概念验证及关键性临床研究</a></dd>           
                                    <dd><a href="/instrument">医疗器械</a></dd>                    
                                    <dd><a href="/equivalence">生物等效性试验</a></dd>                      
                                </dl>
                            </li>
                            <li><a href="/news">最新动态</a>
                                <dl class="subnav">                            
                                    <dd><a href="/news">新闻报道</a></dd>
                                    <dd><a href="/meeting"> 会议信息发布</a></dd>
                                    <dd><a href="/media"> 媒体关注</a></dd>
                                </dl>
                            </li>
                            <li><a href="/jion">加入我们</a></li>
                            <li><a href="/contact">联系我们</a></li>
                            <li>
                                <form class="searchbox" action="/search">
                                    <?php if(isset($_GET['keyword'])) {?>
                                        <input name="keyword" class="textbox" value="<?php echo $_GET['keyword']; ?>" />
                                    <?php }else{?>
                                        <input name="keyword" class="textbox" />
                                    <?php }?>
                                    <button type="submit"><i class="iconfont icon-search"></i></button>
                                </form>
                            </li>
                        </ul>
                    </nav>
                    <a href="/search" class="minsearch"><i class="iconfont icon-search"></i></a>
                    <a href="http://en.crmedicon.com" class="minlang">EN</a>
                    <!-- <a href="javascript:void(0);" id="openav" class="openav"><i class="iconfont icon-menu"></i></a> -->
                    <div class="menu-toggle">
                        <div class="one"></div>
                        <div class="two"></div>
                        <div class="three"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="overmenu" class="overmenu">
            <nav class="leftnav">
                <ul>
                <li><a href="/">首页</a></li>
                            <li><a href="/about">关于我们</a></li>
                            <li><a href="/ectd">服务平台</a></li>
                            <!-- <li><a href="experience">经验领域</a></li> -->
                            <li><a href="/strategy">解决方案</a></li>
                            <li><a href="/news">最新动态</a></li>
                            <li><a href="/jion">加入我们</a></li>
                            <li><a href="/contact">联系我们</a></li>
                </ul>
            </nav>
        </div>
    </header>
