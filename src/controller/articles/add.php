<?php
declare (strict_types = 1);

if($user === null)
{
    header('Location: ' . BASE_URL . 'login');
}

$messageToUser = '';
$errors = [];
$categories = [];
$articleElements = [
    'title' => '',
    'content' => '',
    'category' => ''
];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $articleElements = getParticularElements($_POST, ['title', 'content', 'category']);
    $articleElements['user_id'] = $user['id'];
    clearArticleElements($articleElements);
    $errors = validateArticle($articleElements);

    if (empty($errors)) {
        addArticle($articleElements);
        logStandardInfo('added an article');
        header("Location:" . BASE_URL . "article/" . getLastAddedId());
    }
} else {
    logStandardInfo('entered on add page');
    $categories = getCategories();
}

$pageTitle = "Add article";
$pageContent = template("article/v_add", [
    "messageToUser" => $messageToUser,
    "articleElements" => $articleElements,
    "categories" => $categories,
    "errors" => $errors,
]);