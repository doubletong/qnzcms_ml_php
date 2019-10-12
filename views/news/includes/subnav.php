<aside class="navlist">
    <!-- <a href="/news">
        <div class="row align-items-center no-gutters">
            <div class="col-auto">
                <img src="/" alt="" class="icon">
            </div>
            <div class="col">
                全部
            </div>
            <div class="col-auto">
                <span class="more">more</span>
            </div>
        </div>
    </a>  -->
<?php foreach($categories as $category){?>
    <a href="/news?cid=<?php echo $category['id']; ?>">
        <div class="row align-items-center no-gutters">
            <div class="col-auto">
                <img src="<?php echo $category['thumbnail']; ?>" alt="" class="icon">
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