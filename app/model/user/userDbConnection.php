<?php

function getUserByLogin(string $login) : array
{
    $sql = "SELECT * FROM users WHERE login=:login";
    $query = runSqlQuery($sql);
    $user = $query->fetch();

    return $user;
}