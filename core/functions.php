<?php
declare (strict_types = 1);
include 'db.php';
// your functions may be here

/* start --- black box */

function setArrayKeyWithId(array $arr) : array
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

function getLastAddedId() : string
{
    $conn = getDatabaseConnection();
    return $conn->lastInsertId();
}

function getParticularElements(array $allElements, array $particularElements) : array
{
    $result = [];

    foreach ($particularElements as $element) {
        $result[$element] = $allElements[$element];
    }

    return $result;
}

function checkController(string $controllerName) : bool
{
    return (bool)preg_match('/^[\w_-]+$/', $controllerName);
}

function error404() : void
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    include("view/errors/v_404.php");
    exit();
}

/* end --- black box */