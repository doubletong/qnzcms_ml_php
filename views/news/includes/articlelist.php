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
                        <h3>
                            <a href="/news/detail/<?php echo $article['id']; ?>">
                                <?php echo $article['title'] ?>
                            </a>
                        </h3>
                        <p>ED Par灯、面光灯、光束灯、图案灯、追光灯、成像灯、观众灯、聚光灯、灯控台、硅箱、烟雾机、泡泡机、TRUSS架...调音台、功放、全频音箱、低音音箱、线阵音箱、手持话筒……</p>
                        <div class="row">
                            <div class="col">
                                <!-- <div class="small">
                                <?php echo date('Y-m-d', $article['pubdate']); ?>
                            </div> -->
                            </div>
                            <div class="col-auto">
                                <span class="more">更多详情</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
<?php } ?>
</div>