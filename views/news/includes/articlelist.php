<div class="list list-articles">
    <?php foreach ($articles as $article) { ?>
        <div class="item wow fadeInUp">
            <div class="row align-items-center">
                <div class="col-md-auto">
                   <div class="pub">
                       <strong> <?php echo date('d', $article['pubdate']); ?></strong>
                       <div class="small">
                       <?php echo date('Y-m', $article['pubdate']); ?>
                       </div>
                   </div>
                </div>
                <div class="col-md">
                    <a href="/news/detail/<?php echo $article['id']; ?>" class="clear">                                 
                           <?php echo $article['title'] ?>   
                    </a>
                </div>

            </div>
        </div>
    <?php } ?>
</div>