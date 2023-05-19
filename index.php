<?php
include "app/init.php";

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
Следующие задачи:
Создать контроллер для удаления категорий
Создать контроллер для добавления категорий
Подумать, как это отображать сразу, без перезагрузки страницы (AJAX), мб реакт
 */






/*
2. Можно удалить перенаправление на qsu через 
RewriteRule . index.php 
и обрабатывать запрос через $_SERVER['REQUEST_URI']
3. Убрать двойные слеши 
3.5. Убрать ввод любой фигни с заходом в Index.php
 ^^ Это может решаться каноническими ссылками
 На самом деле потестил на крупных страницах - много где это даже не правится, я бы забил. 
 Только ради опыта поигрался бы с каноническими ссылками.
 4. Сравнить свой роутер с роутером с сайта https://qna.habr.com/q/178365
 

 5. Выводить название категории на странице статей по категории
 6. v_article - убрать подчёркивание $id
 7. Отрефакторить проект. v_articles_list - убрать bg-main с общего div
 8. Можно ли создавать категории с одинаковыми именами?
 9. Как передавать текст ошибки на страницу через header (или без него)
 */
