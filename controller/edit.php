<?php
declare (strict_types = 1);

$categories = getCategories();
$articleElements = ['title' => '', 'content' => '', 'category_id' => ''];
$id = '';
$messageToUser = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(!checkId($_GET['id']))
    {
        error404();
    }
    else {
        $id = (int)$_GET['id'];
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
    //тут не помешала бы проверка на то, есть ли такой article и имеет ли юзер к нему доступ.
    // Но это большая ошибка, включаящая в себя то, что id я храню в hidden поле.
    if(!checkId($_POST['id']))
    {
        error404();
    }
    else {
        $id = (int)$_GET['id'];
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

include 'view/v_edit.php';
