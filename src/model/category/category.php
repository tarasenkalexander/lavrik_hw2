<?php

function validateCategory(string $name) : array
{
    $correctCategoryNameRegExp = "/[aA-zZ]/";
    $errors = [];

    if(!preg_match($correctCategoryNameRegExp, $name))
    {
        $errors[] = "Недопустимые символы в названии категории!";
    }
    if(strlen($name) < 3 || strlen($name) > 127)
    {
        $errors[] = "Недопустимая длина строки!";
    }

    return $errors;
}