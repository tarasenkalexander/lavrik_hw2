<?php
declare (strict_types = 1);
include 'core/functions.php';
include 'model/article/articleDbConnection.php';
include 'model/category/categoryDbConnection.php';
include 'core/logging.php';

$categories = getCategories();
$id = '';
$title = '';
$content = ''; 
$messageToUser = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = (int) $_GET['id'];
    $article = getArticle($id);
    if ($article !== null) {
        $title = $article['title'];
        $content = $article['content'];
        $categoryIdInput = $article['category_id'];
    } else {
        $messageToUser = 'Can\'t find the article';
    }

    logStandardInfo('entered to edit');
} else {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categoryIdOutput = $_POST['category_id'];

    if (checkTitle($title) && checkContent($content)) {
        if (editArticle(intval($id), $title, $content, $categoryIdOutput)) {
            $messageToUser = 'Successfully edited!';
            logStandardInfo('edited successfully');
        } else {
            $messageToUser = "Error wile editing!";
            logStandardInfo('failed editing');
        }
    } else {
        $messageToUser = 'Can\'t edit to empty title or context';
        logStandardInfo('failed editing');
    }
}

include 'view/v_edit.php';
