
    <div class="container">
        <nav class="subnav">           
                <a href="/news" class="<?php echo $cid==null?"active":""; ?>">全部</a>
         
            <?php foreach($categories as $category){?>
              
                    <a href="/news?cid=<?php echo $category['id']; ?>" class="<?php echo $category['id']==$cid?"active":""; ?>"><?php echo $category['title']; ?></a>
                
            <?php } ?>        
        </nav>
    </div>

