<?php
function getDatabaseConnection() : PDO
{
    static $connection;
    if (!isset($connection)) {
        $connection = new PDO("mysql:host=localhost;dbname=lavrik_social_network_v2.1;charset=utf8",
            'root', '');
    }

    return $connection;
}

function runSqlQuery($sql, $params = []) : PDOStatement|false
{
    $connection = getDatabaseConnection();
    $query = $connection->prepare($sql);
    $query->execute($params);

    return $query;
}

function getErrors(PDOStatement $query)
{
    if($query->errorInfo()[0] !== PDO::ERR_NONE)
    {
        $errors = $query->errorInfo();
        include("view/errors/v_common_error.php");
        exit();
    }

    return true;
}