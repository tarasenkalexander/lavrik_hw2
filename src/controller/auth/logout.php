<?php

if($user !== null){
    $user = null;
    unset($_COOKIE['token']);
    setcookie('token', '', 1, BASE_URL);
    unset($_SESSION['token']);
}

header("Location: " . BASE_URL);

