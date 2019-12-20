
<footer class="site-footer">
    <div class="container">
        <div class="row footer-navs">
            <?php foreach ($menutree as $menu) {
                ?>
                <div class="col-md">
                    <dl>
                        <dt><?php echo $menu["title"]; ?></dt>

                        <?php if (isset($menu['children']) && $menu['children']) {
                            foreach ($menu['children'] as $subMenuModel) {
                                ?>

                                <dd><a href="<?php echo $subMenuModel["url"]; ?>"><?php echo $subMenuModel["title"]; ?></a></dd>
                            <?php }
                        } ?>
                    </dl>
                </div> <?php
                    } ?>

        </div>

        <div class="row f-s2 align-items-center no-gutters wow fadeInUp">
            <div class="col">
                <nav class="sinawechat">
                    <a href="javascript:void(0);" title="微信" class="wechat"><i class="iconfont icon-wechat"></i>
                        <div class="qr">
                            <img src="<?php echo $site_info['qrcode'] ?>" alt="公众号">
                        </div>
                    </a>
                 
                    <a href="<?php echo $site_info['weibo'];?>" title="微博"><i class="iconfont icon-sina"></i></a>
                  
                </nav>
            </div>
      
            <div class="col-auto text-right">
            联系方式：<?php echo $site_info['phone'] ?> <br/>
            三达净水：<?php echo $site_info['hotPhone'] ?>
            </div>
        </div>
        <div class="copyright  wow slideInUp">
            <p>
                 <?php echo $site_info['company'] ?>  版权所有 | <a href="http://www.beian.miit.gov.cn"><?php echo $site_info['webnumber'] ?></a>           
            </p>
        </div>
    </div>
</footer>
<div class="qqservice">
    <a href="javascript:void(0);" class="bg-linear totop" id="toTop"><i class="iconfont icon-up"></i></a>
</div>



