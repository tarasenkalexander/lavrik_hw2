<div class="content">
    <div class="article">
        <h1><?=$article['title']?></h1>
        <div><?=$article['content']?></div>
        <div>
            <a href = <?=BASE_URL . "category/" . $article['category_id']?>>
                Category: <?=$categories[$article['category_id']]['name']?></a>
        </div>
        <hr>
        <a href=<?=BASE_URL . "article/$id/delete"?>>Remove</a>
    </div>
</div>
<hr>
<a href=<?=BASE_URL . "article/$id/edit"?>>Edit article</a><br>
<a href=<?=BASE_URL?>>Move to main page</a>