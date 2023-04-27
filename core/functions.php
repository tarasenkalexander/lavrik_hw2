<?php
declare (strict_types = 1);
include 'db.php';
// your functions may be here

/* start --- black box */

function checkTitle(string $title): bool
{
    return $title != '';
}

function checkContent(string $content): bool
{
    return ($content != '' && trim($content) != '');
}

function getLogMessage(string $additionalInformation = ""): string
{
    $time = date('h:m:s');
    $userIP = $_SERVER['REMOTE_ADDR'];
    $URL = $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];
    } else {
        $referer = '';
    }

    return "$time|$userIP|$URL|$referer|$additionalInformation" . PHP_EOL;
}

function setArrayKeyWithId(array $arr)
{
    $result = [];

    foreach ($arr as $value) {
        $result[$value['id']] = $value;
    }

    return $result;
}

function checkId(string $id): bool
{
    return (bool) preg_match('/^[1-9]+\d*$/', $id);
}

//move to model/article.php then
function validateArticle(array $input): array
{
    $errors = [];
    $title = $input['title'];
    $content = $input['content'];

    if (empty($title)) {
        $errors[] = 'Имя не может быть пустым!';
    } else if (mb_strlen($title) <= 2) {
        $errors[] = 'Имя не должно быть короче двух символов!';
    }

    if (empty($content)) {
        $errors[] = 'Контент не может быть пустым!';
    } else if (mb_strlen($content) <= 5) {
        $errors[] = 'Контент не должен быть короче пяти символов!';
    }

    return $errors;
}

function getParticularElements(array $allElements, array $particularElements)
{
    $result = [];

    foreach ($particularElements as $element) {
        $result[$element] = $allElements[$element];
    }

    return $result;
}

function clearArticleElements(array &$articleElements) : void
{
    $articleElements['title'] = trim($articleElements['title']);
    $articleElements['content'] = trim($articleElements['content']);
}
/* end --- black box */
