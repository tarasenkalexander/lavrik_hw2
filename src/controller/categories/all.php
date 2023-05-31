<?php
declare (strict_types = 1);

$categories = getCategories();

$pageTitle = "All categories";
$pageContent = template("category/v_all", [
    'categories' => $categories,
    'pageTitle' => $pageTitle
]);