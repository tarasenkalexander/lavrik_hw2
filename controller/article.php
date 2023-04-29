<?php
declare (strict_types = 1);

if(!checkId($_GET['id']))
{
    error404();
}
else {
    $id = (int)$_GET['id'];
}

$article = getArticle($id);
$categories = getCategories();
$hasPost = ($article !== null && $article != false);

logStandardInfo();
if($hasPost)
{
    include('view/v_article.php');
}
else{
    error404();
}