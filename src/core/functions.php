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

function generateToken() : string{
    return bin2hex(random_bytes(32));;
}

function template(string $path, array $vars = []): string
{
    $fullPath = "src/view/$path.php";
    extract($vars);
    ob_start();
    include ($fullPath);
    $page = ob_get_clean();

    return $page;
}
