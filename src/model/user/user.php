<?php

function validateLogin(string $login): bool
{
    $allowedLoginSymbolsReg = "/^[aA-zZ0-9_]+$/"; // потестить отдельно

    return (mb_strlen($login) > 2 && mb_strlen($login) < 128
        && preg_match($allowedLoginSymbolsReg, $login));
}

function validatePassword(string $password): bool
{
    $allowedPasswordSymbolsReg = "/^[aA-zZ0-9_*+-]+$/";

    return (mb_strlen($password) > 2 && mb_strlen($password) < 128
        && preg_match($allowedPasswordSymbolsReg, $password));
}

function getAuthUser(string $token):  ? array
{
    $user = null;
    $session = getSession($token);
    if (isset($session)) {
        $user = getUserById($session['user_id']);
        $_SESSION['token'] = $token;
        
        if ($user === null) {
            unset($_SESSION['token']);
            setcookie('token', '', time() - 1);
        }
    }
    return $user;
}

function loginUser(int $userId, bool $isRemember = true) : void {
    $token = generateToken();
    $_SESSION["token"] = $token;
    if ($isRemember) {
        setcookie('token', $token, time() + 3600 * 24 * 30, BASE_URL);
    }
    addSession($token, $userId);
}
