<?php
declare (strict_types = 1);

$messageToUser = '';
$errors = [];
$articleElements = [
    'title' => '',
    'content' => '',
    'category' => '',
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articleElements = getParticularElements($_POST, ['title', 'content', 'category']);
    clearArticleElements($articleElements);
    $errors = validateArticle($articleElements);

    if (empty($errors)) {
        addArticle($articleElements);
        logStandardInfo('added an article');
        header("Location: index.php?c=article&id=" . getLastAddedId());
    }
} else {
    logStandardInfo('entered on add page');
    $categories = getCategories();
}

$pageTitle = "Edit article";
$pageContent = template("article/v_add", [
    "messageToUser" => $messageToUser,
    "articleElements" => $articleElements,
    "categories" => $categories,
    "errors" => $errors,
]);
