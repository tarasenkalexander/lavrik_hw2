<?php
include ("app/init.php");

$pageTitle = '';
$pageContent = '';

$controllerName = $_GET['c'] ?? 'index';
$controllerPath = "app/controller/$controllerName.php";
if(checkController($controllerName) && file_exists($controllerPath))
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

