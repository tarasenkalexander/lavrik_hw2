<a href="index.php?c=add">Add article</a><br>
<a href="index.php?c=logs">View logs</a>
<hr>
<div class="articles">
    <?php foreach ($articles as $id => $article): ?>
    <div class="article">
        <h2><?=$article['title']?></h2>
        <a href="index.php?c=article&id=<?=$id?>">Read more</a>
    </div>
    <?php endforeach;?>
</div>