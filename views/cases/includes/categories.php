<aside class="navlist">  
        <a href="/cases">
            <div class="row align-items-center no-gutters">
                <div class="col-auto">
                    <img src="/uploads/images/cases/icons/icon_7.png" alt="全部案例" class="icon">
                </div>
                <div class="col">
                    全部案例
                </div>
                <div class="col-auto">
                    <span class="more">more</span>
                </div>
            </div>
        </a> 
    <?php foreach($categories as $category){?>
        <a href="/cases?cid=<?php echo $category['id']; ?>">
            <div class="row align-items-center no-gutters">
                <div class="col-auto">
                    <img src="<?php echo $category['imageurl']; ?>" alt="<?php echo $category['title']; ?>" class="icon">
                </div>
                <div class="col">
                    <?php echo $category['title']; ?>
                </div>
                <div class="col-auto">
                    <span class="more">more</span>
                </div>
            </div>
        </a> 
    <?php } ?>        
</aside>