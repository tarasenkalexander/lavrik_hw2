<?php

$categoryId = PARAMS_URL["categoryId"];
$articlesByCategory = getArticlesByCategory($categoryId);
$moveToMain = template("common/v_move_to_main", []);
if (checkId($categoryId) && $articlesByCategory) {

    $pageTitle = "Cats"; // тут бы получать название категории
    $pageContent = template("article/v_articles_list", [
        "articles" => $articlesByCategory,
        "pageTitle" => $pageTitle,
        "moveToMain" => $moveToMain,
    ]);
} else {
    header('Location:' . BASE_URL . 'e404');
}
