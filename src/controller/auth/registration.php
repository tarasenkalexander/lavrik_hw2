<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if ($password != $_POST['password_confirm']) {
        $errors[] = "Passwords are unequal";
    } else if (!validateLogin($login)) {
        $errors[] = "Login is incorrect";
    } else if (!validateLogin($password)) {
        $errors[] = "Password is incorrect";
    } else {
        addUser($login, password_hash($password, PASSWORD_BCRYPT));
        $_SESSION['registered_succesfully'] = true;
        $user = getUserByLogin($login);
        loginUser($user['id']);
        header('Location: ' . BASE_URL);
    }
}

$pageTitle = "Registration";
$pageContent = template('auth/v_registration', ['errors' => $errors]);
