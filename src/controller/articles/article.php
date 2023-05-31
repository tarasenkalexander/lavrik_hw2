<?php
declare (strict_types = 1);

$id = (int) PARAMS_URL['id'];

$article = getArticle($id);
$hasPost = ($article !== null && $article != false);

if ($hasPost) {
    $categories = getCategories();

    if(isset($user))
    {
        $isAuthor = ($article['user_id'] == $user['id']);
    }
    else{
        $isAuthor = false;
    }

    $pageTitle = $article["title"];
    $pageContent = template("article/v_article", [
        "article" => $article,
        "categories" => $categories,
        "id" => $id,
        "isAuthor" => $isAuthor
    ]);
} else {
    header('Location:' . BASE_URL . 'e404');
}
