<footer class="site-footer">
    <div class="container">
        <div class="row footer-navs">
        <?php foreach( $menutree as $menu)
                        {
                            ?>
                           <div class="col-md">
                <dl>
                            <dt><?php echo $menu["title"]; ?></dt>

                            <?php if($menu['children']){ 
                                foreach( $menu['children'] as $subMenuModel){
                            ?>
                             
                                <dd><a href="<?php echo $subMenuModel["url"]; ?>"><?php echo $subMenuModel["title"]; ?></a></dd>
                            <?php } 
                    }?>    
                    </dl>
            </div> <?php
                    } ?>                            
            
        </div>

        <div class="row f-s2 align-items-center no-gutters wow fadeInUp">
            <div class="col-md-auto">
                <nav class="sinawechat">
                <a href="http://weibo.com/microportchina" title="微博"><i class="iconfont icon-sina"></i></a>
                <a href="#" title="微信"><i class="iconfont icon-wechat"></i></a>
                <a href="http://i.youku.com/microport" title="优酷"><i class="iconfont icon-youku1"></i></a>
                </nav>
            </div>
            <div class="col-md">
                <div class="support"> <a href="#">法律声明</a>   |  <a href="#">招贤纳士</a> <br/>
                客户支持邮箱：MTS@microport.com
                </div>
            </div>
            <div class="col-md-auto logo">
                <img src="/img/bot_logo.png" alt="logo">
            </div>
        </div>
        <div class="copyright  wow slideInUp">
            <p>
            &copy;Copyright 1998-2019, MicroPort Scientific Corporation. All rights reserved.   |   网站备案/许可证号：<a href="http://www.beian.miit.gov.cn">沪ICP备06056186号</a> <span class="designby">
                Design by:<a href="http://www.inholy.com" target="_blank">HOLY荷勒</a>
            </span>  
                 <br/>  互联网药品信息服务资格证书编号：（沪）- 非经营性 - 2016 - 0131
            </p>
        </div>
    </div>

</footer>
<div class="qqservice">
    <a href="javascript:void(0);" class="bg-linear totop" id="toTop"><i class="iconfont icon-up"></i></a>
</div>