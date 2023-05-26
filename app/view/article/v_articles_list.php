<section class="articles mt-2 align-items-stretch">
    <div class="container">
        <div class="row">
            <?php foreach ($articles as $id => $article): ?>
            <div class="col-4 border border-2">
                <div class="article">
                    <h2>
                        <?=$article['title']?>
                    </h2>
                    <a href=<?=BASE_URL . "article/$id"?>>Read more</a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
    <?php if(isset($moveToMain)): ?>
    <?=$moveToMain?>
    <?php endif;?>
</section>
<footer class="bg-footer fixed-bottom text-center">
    2023 &#169; Alex
</footer>