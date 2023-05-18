<?php
include "app/init.php";
include "app/core/router.php";

$pageTitle = '';
$pageContent = '';

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

include "app/view/base/v_main.php";



/*
2. Можно удалить перенаправление на qsu через 
RewriteRule . index.php 
и обрабатывать запрос через $_SERVER['REQUEST_URI']
3. Убрать двойные слеши 
3.5. Убрать ввод любой фигни с заходом в Index.php
 ^^ Это может решаться каноническими ссылками
 На самом деле потестил на крупных страницах - много где это даже не правится, я бы забил. 
 Только ради опыта поигрался бы с каноническими ссылками.
 */
