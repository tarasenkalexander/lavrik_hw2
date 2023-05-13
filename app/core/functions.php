<?php
declare (strict_types = 1);
include 'db.php';

function setArrayKeyWithId(array $arr): array
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

function getLastAddedId(): string
{
    $conn = getDatabaseConnection();
    return $conn->lastInsertId();
}

function getParticularElements(array $allElements, array $particularElements): array
{
    $result = [];

    foreach ($particularElements as $element) {
        $result[$element] = $allElements[$element];
    }

    return $result;
}

function checkController(string $controllerName): bool
{
    return (bool) preg_match('/^[\w_-]+$/', $controllerName);
}

function error404(): void
{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    include "app/view/errors/v_404.php";
    exit();
}

function template(string $path, array $vars = []): string
{
    $fullPath = "app/view/$path.php";
    extract($vars);
    ob_start();
    include ($fullPath);
    $page = ob_get_clean();

    return $page;
}
