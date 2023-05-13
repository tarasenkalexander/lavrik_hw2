<?php
function getDatabaseConnection(): PDO
{
    static $connection;
    if (!isset($connection)) {
        $connection = new PDO("mysql:host=" . DB_HOST . ";dbname=". DB_NAME . ";charset=utf8",
            DB_USER, DB_PASS);
    }

    return $connection;
}

function runSqlQuery($sql, $params = []): PDOStatement | false
{
    $connection = getDatabaseConnection();
    $query = $connection->prepare($sql);
    $query->execute($params);

    return $query;
}

function getErrors(PDOStatement $query)
{
    if ($query->errorInfo()[0] !== PDO::ERR_NONE) {
        $errors = $query->errorInfo();
        include "view/errors/v_common_error.php";
        exit();
    }

    return true;
}
