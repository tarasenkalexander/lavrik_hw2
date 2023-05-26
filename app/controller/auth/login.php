<?php

$isLoggedIn = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["loginInput"];
    $password = $_POST["passwordInput"];
    $isRemember = isset($_POST["isRemember"]);

    if(!validateLogin($login))
    {
        $isLoggedIn;
    }
    else{
        
    }
}

$pageTitle = "Login";
$pageContent = template("auth/v_login", ["isLoggedIn" => $isLoggedIn]);
