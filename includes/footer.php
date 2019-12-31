
<footer class="site-footer">
    <div class="container">
        <menu class="botnav  wow slideInUp">
            <?php foreach ($menus_bot as $menu) { ?>
                <a href="<?php echo $menu["url"]; ?>"><?php echo $menu["title"]; ?></a>
            <?php } ?> 
        </menu>
        

    
        <div class="copyright  wow slideInUp">
            <p>
                &copy; 2017 <?php echo $site_info['company'] ?>  版权所有  <a href="http://www.beian.miit.gov.cn"><?php echo $site_info['webnumber'] ?></a>    |   沪公网安备 31011502002188号      
            </p>
        </div>
    </div>
</footer>
<div class="qqservice">
    <a href="javascript:void(0);" class="bg-linear totop" id="toTop"><i class="iconfont icon-up"></i></a>
</div>



