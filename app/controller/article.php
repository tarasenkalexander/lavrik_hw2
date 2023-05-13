<?php
declare (strict_types = 1);

if(!checkId($_GET['id']))
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    $pageTitle = "404 Error";
    $pageContent = template("errors/v_404");
}
else {
    $id = (int)$_GET['id'];
}

$article = getArticle($id);
$hasPost = ($article !== null && $article != false);

if($hasPost)
{
    $categories = getCategories();
    
    $pageTitle = $article["title"];
    $pageContent = template("article/v_article", [
        "article" => $article,
        "categories" => $categories,
        "id" => $id
    ]);
}
else{    
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    $pageTitle = "404 Error";
    $pageContent = template("errors/v_404");
}