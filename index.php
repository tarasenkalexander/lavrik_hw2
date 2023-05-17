<?php

include ("app/init.php");
include ("app/core/router.php");

// echo $_SERVER["REQUEST_URI"];
// echo "<br>";
// echo BASE_URL;
$router = new Router($_GET['querysystemurl'] ?? '');

$router->addRoutes([
    [
        'reg' => '~/?~',
        'controller' => 'index.php'
    ],
    [
        'reg' => '~add/?~',
        'controller' => 'add'
    ],
    [
        'reg' => "~article/:num/?~",
        'controller' => 'article',
        'params' => ['id' => 1]
    ],
    [
        'reg' => "~article/:num/edit/?~",
        'controller' => 'edit',
        'params' => ['id' => 1]
    ],
    [
        'reg' => "~article/:num/delete/?~",
        'controller' => 'delete',
        'params' => ['id' => 1]
    ]

]);

$pageTitle = '';
$pageContent = '';

$router->dispatch();

$controllerName = $router::$routingResult['controller'] ?? 'index';
$controllerPath = "app/controller/$controllerName.php";

if(file_exists($controllerPath))
{
    include($controllerPath);
}
else{
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    $pageTitle = "404 Error";
    $pageContent = template("errors/v_404");
}

include ("app/view/base/v_main.php");


/**
 * Я остановился на том, что у меня выбрасывает ошибку, когда я пытаюсь получить доступ к любой странице.
 * Я вспомнил, что нужно задать базовый контроллер-ошибку в dispatch, но понял, что не знаю, как этот
 * контроллер создать
 */


/**
 * Лаврика:
 * 2. Сделать красоту в проекте, бутстрап, добавить разметки для сложности
 *      Загуглить базовый гайд по бутстрапу, желательно с видео. Мне это пригодится в MLWS
 */


/**
 * Моё:
 * 
 * 1. Бахнуть исключения
 * 2. Заменить template на Twig чисто для опыта
 * 3. Переделать getArticle в model: чтобы он сразу возвращал название категории, а то сейчас
 * ублюдская реализация
 */

