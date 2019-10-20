<aside class="navlist">      
    <?php foreach($categories as $category){?>
        <a href="/service/projects/<?php echo $category['id']; ?>" class="wow fadeInUp">
            <div class="row align-items-center no-gutters">
                <div class="col-auto">
                    <img src="<?php echo $category['thumbnail']; ?>" alt="<?php echo $category['title']; ?>" class="icon">
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