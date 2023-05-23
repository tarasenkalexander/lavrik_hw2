<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $categoryId = (int)$_POST['id'];
    $categoryName = $_POST['categoryName'];

    $errorsOrMessage = validateCategory($categoryName);
    if (empty($errorsOrMessage)) {
        if (editCategory($categoryId, ["name" => $categoryName])) {
            $errorsOrMessage[] = "Category successfully edited";
        }
    }

    print_r($errorsOrMessage);
}
