<?php
declare (strict_types = 1);

if (!checkId(PARAMS_URL['id'])) {
    header('Location:' . BASE_URL . 'e404');
} else {
    $id = (int) PARAMS_URL['id'];
}

$article = getArticle($id);
$hasPost = ($article !== null && $article != false);

if ($hasPost) {
    $categories = getCategories();

    $pageTitle = $article["title"];
    $pageContent = template("article/v_article", [
        "article" => $article,
        "categories" => $categories,
        "id" => $id,
    ]);
} else {
    header('Location:' . BASE_URL . 'e404');
}
