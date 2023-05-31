<main>
    <section class="articles mt-2 align-items-stretch">
        <div class="container">
            <?php if (isset($firstRegisterted) && $firstRegisterted): ?>
            <div class="alert alert-success">
                You registered successfully!
            </div>
            <?php endif;?>
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
        <?php if (isset($moveToMain)): ?>
        <?=$moveToMain?>
        <?php endif;?>
    </section>
</main>