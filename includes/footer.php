<footer class="site-footer">
    <div class="container top">
        <div class="row  wow slideInUp">
            <div class="col-md">
                <div class="nav1">
                    <h3 class="title">网站导航 / Website navigation</h3>
                    <nav>
                        <a href="/">首页</a>
                        <a href="/">公司简介</a>
                        <a href="/">服务项目</a>
                        <a href="/">成功案例</a>
                        <a href="/">新闻资讯</a>
                        <a href="/">联系我们</a>
                        <a href="/">网站地图</a>
                    </nav>
                </div>
                <div class="nav1">
                    <h3 class="title">公司地址 / Factory address</h3>
                    <dl class="address">
                        <dd><?php echo $site_info['address'] ?></dd>
                        <!-- <dd>深圳市龙岗区布吉街道龙岗大道布吉街道龙岗大道1188-88号</dd> -->
                    </dl>
                </div>
                <div class="nav1">
                    <h3 class="title">友情链接 / Friendship link</h3>
                    <nav>
                        <a href="/">首页</a>
                        <a href="/">公司简介</a>
                        <a href="/">服务项目</a>
                        <a href="/">成功案例</a>
                        <a href="/">新闻资讯</a>
                        <a href="/">联系我们</a>
                        <a href="/">网站地图</a>
                    </nav>
                </div>
            </div>

            <div class="col-md-auto">
                <div class="contact">
                    <h3 class="title">联系方式 / Contact  us</h3>
                    <p class="phone">
                        <?php echo $site_info['phone'] ?>
                    </p>
                    <p>E-mail：<?php echo $site_info['email'] ?></p>
                </div>
                <div class="formcontact">
                    <div class="row">
                        <div class="col">
                            <input type="text" name="company" id="company" placeholder="公司或单位名称">
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <input type="text" name="name" id="name" placeholder="您的昵称">
                                </div>
                                <div class="col-8">
                                    <input type="text" name="phone" id="phone" placeholder="您的电话">
                                </div>
                            </div>
                            <button type="submit">免费获取策划方案</button>
                        </div>
                        <div class="col-auto">
                            <img src="<?php echo $site_info['qrcode'] ?>" class="qrcode" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bot">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <?php echo $site_info['sitename'] ?>｜版权所有｜Copyright © 2019-2022｜ <a href="http://www.beian.miit.gov.cn"><?php echo $site_info['webnumber'] ?></a>
                </div>
                <div class="col-md-auto">
                    <a href="/legal_notices">法律声明</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="qqservice">
    <a href="javascript:void(0);" class="bg-linear totop" id="toTop"><i class="iconfont icon-up"></i></a>
</div>