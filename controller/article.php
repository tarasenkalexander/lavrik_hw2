<?php
declare (strict_types = 1);
include 'model/article/articleDbConnection.php';
include 'model/category/categoryDbConnection.php';
include 'core/logging.php';

$id = (int) ($_GET['id'] ?? '');

$post = getArticle($id);
$categories = getCategories();
$hasPost = ($post !== null && $post != false);

logStandardInfo();
if($hasPost)
{
    include('view/v_article.php');
}
else{
    include('view/v_404.php');
}