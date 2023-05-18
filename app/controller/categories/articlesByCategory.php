<?php

$categoryId = PARAMS_URL["categoryId"];
$articlesByCategory = getArticlesByCategory($categoryId);
if (checkId($categoryId) && $articlesByCategory) {

    $pageTitle = "Cats";
    $pageContent = template("article/v_all", [
        "articles" => $articlesByCategory,
        "pageTitle" => $pageTitle,
    ]);
} else {
    header('Location:' . BASE_URL . 'e404');
}
