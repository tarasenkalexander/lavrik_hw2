<?php

$isLogged = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["loginInput"];
    $password = $_POST["passwordInput"];
    $isRemember = isset($_POST["isRemember"]);

    if (!validateLogin($login) || !validatePassword($password)) {
        $isLogged = false;
    } else {
        $user = getUserByLogin($login);
        if (isset($user)) {
            if (password_verify($password, $user["hash_password"])) {
                loginUser($user['id'], $isRemember);
                header("Location:" . BASE_URL);
            } else {
                $isLogged = false;
            }
        } else {
            $isLogged = false;
        }
    }

}

$pageTitle = "Login";
$pageContent = template("auth/v_login", ["isLogged" => $isLogged]);
