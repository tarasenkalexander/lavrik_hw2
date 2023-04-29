<div class="content">
    <div class="article">
        <h1><?=$article['title']?></h1>
        <div><?=$article['content']?></div>
        <div>
            <p>Category: <?=$categories[$article['category_id']]['name']?></p>
        </div>
        <hr>
        <a href="index.php?c=delete&id=<?=$id?>">Remove</a>
    </div>
</div>
<hr>
<a href="index.php?c=edit&id=<?=$id?>">Edit article</a><br>
<a href="index.php">Move to main page</a>