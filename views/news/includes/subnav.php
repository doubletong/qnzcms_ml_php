<div class="subnav">
    <div class="container-fluid">
    <nav class="row no-gutters">
        <div class="col">
            <a href="/news" class="<?php echo $cid==null?"active":""; ?>">全部</a>
        </div>
        <?php foreach($categories as $category){?>
            <div class="col">
                <a href="/news?cid=<?php echo $category['id']; ?>" class="<?php echo $category['id']==$cid?"active":""; ?>"><?php echo $category['title']; ?></a>
            </div>      
        <?php } ?>        
    </nav>
    </div>
</div>
