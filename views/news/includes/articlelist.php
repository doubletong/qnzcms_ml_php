<div class="list list-articles">
    <?php foreach ($articles as $article) { ?>
        <div class="item wow fadeInUp">
            <div class="row">
                <div class="col-md-auto">
                    <a href="/news/detail/<?php echo $article['id']; ?>" class="pic">
                        <img src="<?php echo $article['thumbnail']; ?>" alt="<?php echo $article['title']; ?>">
                    </a>
                </div>
                <div class="col-md">
                    <div class="txt">
                        <h3 class="title">
                            <a href="/news/detail/<?php echo $article['id']; ?>">
                                <?php echo $article['title'] ?>
                            </a>
                        </h3>
                        <time><?php echo date('Y-m-d',$article['pubdate']) ;?></time>                      
                          <p><?php echo $article['summary']; ?></p>
                        
                                <span class="more">查看详情 ></span>
                        
                      

                    </div>

                </div>

            </div>

        </div>
<?php } ?>
</div>