<div class="list list-articles">
    <?php foreach ($articles as $article) { ?>
        <div class="item wow fadeInUp">
            <div class="row">
                <div class="col-md-auto">
                    <a href="/news/detail/<?php echo $article['id']; ?>" class="pic">
                        <img src="<?php echo empty($article['thumbnail']) ? "/img/news_detail.jpg" : $article['thumbnail']; ?>" alt="<?php echo $article['title'] ?>" />
                    </a>
                </div>
                <div class="col-md">
                    <a href="/news/detail/<?php echo $article['id']; ?>" class="clear">
                        <div class="txt">
                            <p class="category"><?php echo $article['category_title']; ?></p>
                            <h3><?php echo $article['title'] ?></h3>
                            <p class="summary"><?php echo mb_substr($article['summary'], 0, 140, 'utf-8') . "…"; ?></p>
                            <div class="row">
                                <div class="col">
                                    <div class="date">
                                    <?php echo date('Y-m-d', $article['pubdate']); ?>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="view">
                                        查看详情 <i class="iconfont icon-arrow-right"></i>
                                    </div>
                                    
                                </div>
                                </div> 
                        </div>
                    </a>
                </div>

            </div>
        </div>
    <?php } ?>
</div>