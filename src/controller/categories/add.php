<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoryName = $_POST['categoryName'];
    $errorsOrMessage = validateCategory($categoryName);
    if (empty($errorsOrMessage)) {
        if (addCategory(["name" => $categoryName])) {
            $errorsOrMessage[] = 'Category succesfully added';
        }
    }

    print_r($errorsOrMessage);
}
