<?php
include "app/init.php";

$pageTitle = '';
$pageContent = '';
$ajaxControllers = ["categories/add", "categories/delete", "categories/edit"];
$router = new Router("/" . ($_GET['querysystemurl'] ?? ""));
$router->dispatch();

$controllerName = $router::$routingResult['controller'];
if (isset($router::$routingResult['params'])) {
    define('PARAMS_URL', $router::$routingResult['params']);
}
$controllerPath = "app/controller/$controllerName.php";

if (file_exists($controllerPath)) {
    include $controllerPath;
} else {
    header('Location:' . BASE_URL . 'e404');
}
if (!in_array($controllerName, $ajaxControllers)) {
    include "app/view/base/v_main.php";
}