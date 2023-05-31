<?php

function getUserByLogin(string $login):  ? array
{
    $sql = "SELECT * FROM users WHERE login=:login";
    $query = runSqlQuery($sql, ["login" => $login]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    return $user ? $user : null;
}

function getUserById(int $id) :  ? array
{
    $sql = "SELECT * FROM users WHERE id=$id"; // почему я могу задать его здесь вот так?
    $query = runSqlQuery($sql);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    return $user ? $user : null;
}

function addUser(string $login, string $hash_password) : bool
{
    $sql = "INSERT INTO users(login, hash_password) VALUES (:login, :hash_password);";
    $query = runSqlQuery($sql, ['login' => $login, 'hash_password' => $hash_password]);

    return getErrors($query);
}
