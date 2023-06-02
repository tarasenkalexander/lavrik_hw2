<?php
include "src/init.php";

session_start();

$token = $_SESSION['token'] ?? $_COOKIE['token'] ?? null;
// echo "Cook: ";
// var_dump( $_COOKIE['token']);
// echo "<hr>";
// echo "Sess: ";
// var_dump( $_SESSION['token']);
// echo "<hr>";

$user = $token ? getAuthUser($token) : null;
// echo "<hr>";
// echo "<hr>";
// var_dump($user);

$pageTitle = '';
$pageContent = '';
$ajaxControllers = ["categories/add", "categories/delete", "categories/edit"];
$router = new Router("/" . ($_GET['querysystemurl'] ?? ""));
$router->dispatch();

$controllerName = $router::$routingResult['controller'];
if (isset($router::$routingResult['params'])) {
    define('PARAMS_URL', $router::$routingResult['params']);
}
$controllerPath = "src/controller/$controllerName.php";

if (file_exists($controllerPath)) {
    include $controllerPath;
} else {
    header('Location:' . BASE_URL . 'e404');
    exit();
}
if (!in_array($controllerName, $ajaxControllers)) {
    include "src/view/base/v_main.php";
}