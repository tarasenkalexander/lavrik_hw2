<?php
declare (strict_types = 1);

$categories = getCategories();

$pageTitle = "All categories";
$pageContent = template("category/v_all", [
    'categories' => $categories,
    'pageTitle' => $pageTitle
]);

/**
 * вывод всех категорий
 *
 * шлю запрос в бд на получение всех категорий
 * Отправляю их в category/v_all
 */