<?php
declare (strict_types = 1);
include_once 'core/functions.php';
include_once 'model/article/articleDbConnection.php';
include_once 'model/category/categoryDbConnection.php';
include_once 'core/logging.php';

$messageToUser = '';
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
        $messageToUser = 'Article added successfully!';
        logStandardInfo('added an article');
    }
} else {
    logStandardInfo('entered on add page');
    $categories = getCategories();
}

include 'view/v_add.php';

/**
 * Как именно будет работать валидация?
 * Есть функция, в которую я шлю поля из post. Она проверяет эти поля и возвращает массив сообщений
 * На view я прохожу этот массив сообщений и вывожу их все
 */
