<?php

$categoryId = $_GET["categoryId"];

$articlesByCategory = getArticlesByCategory($categoryId);

$pageTitle = "Cats";
$pageContent = template("article/v_index", [
    "articles" => $articlesByCategory,
    "pageTitle" => $pageTitle
]);