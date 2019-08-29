<footer class="site-footer">
    <div class="container">
        <div class="row footer-navs  wow slideInUp">
            <div class="col-lg-auto">
                <div class="logo_bot">
                <img src="/img/logo_bot.png" alt="<?php echo $site_info['sitename']; ?>">
                </div>
            </div>
            <div class="col-lg">
                <nav>
                    <?php foreach ($menus_bot as $menu) {
                        ?>
                        <a href="<?php echo $menu["url"]; ?>"><?php echo $menu["title"]; ?></a>
                        <?php
                        } ?>
                </nav>
            </div>

        </div>

        <div class="row contact  wow slideInUp">
            <div class="col-md-6 col-lg-auto">
                <div class="row">
                    <div class="col-auto">
                        <div class="icon"><i class="iconfont icon-phone"></i></div>
                    </div>
                    <div class="col">
                        <dl>
                            <dt>联系电话</dt>
                            <dd><?php echo $site_info['phone']; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-auto">
                <div class="row">
                    <div class="col-auto">
                        <div class="icon"><i class="iconfont icon-email"></i></div>
                    </div>
                    <div class="col">
                        <dl>
                            <dt>联系邮箱</dt>
                            <dd><?php echo $site_info['email']; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md">
                <div class="row">
                    <div class="col-auto">
                        <div class="icon"><i class="iconfont icon-address"></i></div>
                    </div>
                    <div class="col">
                        <dl>
                            <dt>公司地址</dt>
                            <dd><?php echo $site_info['address']; ?></dd>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="col-md-auto">

            </div>
        </div>
    </div>

    <div class="copyright  wow slideInUp">
        <div class="container">
            ​版权所有: 北京先通国际医药科技股份有限公司 <a href="http://www.beian.miit.gov.cn"><?php echo $site_info['webnumber'] ?></a>
        </div>
    </div>
</footer>

<div class="qqservice">
    <a href="javascript:void(0);" class="bg-linear totop" id="toTop"><i class="iconfont icon-up"></i></a>
</div>