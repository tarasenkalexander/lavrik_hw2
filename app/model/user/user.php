<?php

function validateLogin(string $login): bool
{
    $allowedLoginSymbolsReg = "/[aA-zZ0-9_]+/"; // потестить отдельно

    return (mb_strlen($login) > 2 && mb_strlen($login) < 128 && !preg_match($allowedLoginSymbolsReg, $login));
}

function validatePassword(string $password): bool
{
    $allowedPasswordSymbolsReg = "/^[aA-zZ0-9_*-]+$/";

    return (mb_strlen($password) > 2 && mb_strlen($password) < 128 
            && !preg_match($allowedPasswordSymbolsReg, $password));
}
