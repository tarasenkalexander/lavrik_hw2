<?php
declare (strict_types = 1);

$articles = getArticles();
logStandardInfo();
if (isset($_SESSION['registered_succesfully'])) {
    $firstRegisterted = true;
    unset($_SESSION['registered_succesfully']);
} else {
    $firstRegisterted = false;
}

$pageTitle = "All articles";
$pageContent = template("article/v_articles_list",
    [
        "pageTitle" => $pageTitle,
        "articles" => $articles,
        "firstRegisterted" => $firstRegisterted,
    ]);
