<?php
include 'core/functions.php';
include 'model/article/articleDbConnection.php';
include 'model/article/article.php';
include 'model/category/categoryDbConnection.php';
include 'core/logging.php';

$controllerName = $_GET['c'] ?? 'index';
$path = "controller/$controllerName.php";
if(checkController($controllerName) && file_exists($path))
{
    include($path);
}
else{
    error404();
}


/**
 * Разобраться в namespace и папках, как их правильно указывать
 * Как именно работают include? Откуда их нужно подключать, из места использования функции или из места объявления?
 * Можно ли объединить код добавления статьи в add и edit?
 * Что быстрее - UPDATE или ADD + DELETE?
 */

 /*
 после разбора дз:
 1. $query->execute может вернуть false, не только PDOStatement. Это тоже нужно обрабатывать, 
 но как - хороший вопрос.
 Можно через исключения, но это в перспективе. Прямо сейчас можно при каждом execute поставить if, который 
 будет выбрасывать ошибку в common_error с подходящим сообщением. Но спорно, всё равно в перспективе всё менять
 под исключения 
 */