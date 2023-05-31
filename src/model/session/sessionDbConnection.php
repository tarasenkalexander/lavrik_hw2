<?php

function getSession(string $token) : ?array {
    $sql = "SELECT * FROM sessions WHERE token=:token";
    $query = runSqlQuery($sql, ["token" => $token]);
    $session = $query->fetch(PDO::FETCH_ASSOC);

    return $session;
}

function addSession(string $token, int $user_id) : bool {
    $sql = "INSERT INTO sessions(token, user_id) VALUES (:token, :user_id);";
    $query = runSqlQuery($sql, ["token" => $token, "user_id" => $user_id]);

    return getErrors($query);
}