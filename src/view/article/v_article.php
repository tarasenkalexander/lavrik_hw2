<div class="content">
    <div class="article">
        <h1><?=$article['title']?></h1>
        <div><?=$article['content']?></div>
        <div>
            <a href=<?=BASE_URL . "articles/" . $article['category_id']?>>
                Category: <?=$categories[$article['category_id']]['name']?></a>
        </div>
        <hr>
        <?php if ($isAuthor): ?>
        <a href=<?=BASE_URL . "article/$id/delete"?>>Remove</a>
        <?php endif;?>
    </div>
</div>
<?php if ($isAuthor): ?>
<hr>
<a href=<?=BASE_URL . "article/$id/edit"?>>Edit article</a><br>
<?php endif;?>
<a href=<?=BASE_URL?>>Move to main page</a>