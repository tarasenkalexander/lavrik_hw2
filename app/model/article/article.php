<?php

function validateArticle(array $input): array
{
    $errors = [];
    $title = $input['title'];
    $content = $input['content'];

    if (empty($title)) {
        $errors[] = 'Имя не может быть пустым!';
    } else if (mb_strlen($title) <= 2) {
        $errors[] = 'Имя не должно быть короче трёх символов!';
    }

    if (empty($content)) {
        $errors[] = 'Контент не может быть пустым!';
    } else if (mb_strlen($content) <= 5) {
        $errors[] = 'Контент не должен быть короче пяти символов!';
    }

    return $errors;
}

function clearArticleElements(array &$articleElements) : void
{
    $articleElements['title'] = htmlspecialchars(trim($articleElements['title']));
    $articleElements['content'] = htmlspecialchars(trim($articleElements['content']));
}