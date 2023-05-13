<?php
declare (strict_types = 1);

$categories = getCategories();
$articleElements = ['title' => '', 'content' => '', 'category_id' => ''];
$id = '';
$messageToUser = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!checkId($_GET['id'])) {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        $pageTitle = "404 Error";
        $pageContent = template("errors/v_404");
    } else {
        $id = (int) $_GET['id'];
    }
    $article = getArticle($id);
    if ($article !== null) {
        $articleElements['title'] = $article['title'];
        $articleElements['content'] = $article['content'];
        $articleElements['category_id'] = $article['category_id'];
    } else {
        $messageToUser = 'Can\'t find the article';
    }

    logStandardInfo('entered to edit');
} else {
    if (!checkId($_POST['id'])) {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        $pageTitle = "404 Error";
        $pageContent = template("errors/v_404");
    } else {
        $id = (int) $_GET['id'];
    }
    $articleElements = getParticularElements($_POST, ['title', 'content', 'category_id']);
    clearArticleElements($articleElements);
    $errors = validateArticle($articleElements);

    if (empty($errors)) {
        if (editArticle($id, $articleElements)) {
            $messageToUser = 'Successfully edited!';
            logStandardInfo('edited successfully');
        } else {
            $messageToUser = "Error while editing!";
            logStandardInfo('failed editing');
        }
    } else {
        logStandardInfo('failed editing');
    }
}

$pageTitle = "Edit article";
$pageContent = template("article/v_edit", [
    "messageToUser" => $messageToUser,
    "articleElements" => $articleElements,
    "categories" => $categories,
    "id" => $id,
    "errors" => $errors,
]);
