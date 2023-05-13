<?php
declare (strict_types = 1);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!checkId($_GET['id'])) {
        header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
        $pageTitle = "404 Error";
        $pageContent = template("errors/v_404");
    } else {
        $id = (int) $_GET['id'];
    }
    if ($id <= 0) {
        $error = "Wrong id sent";
    } else {
        $isRemovedArticle = removeArticle($id);

        if (!$isRemovedArticle) {
            $error = 'Can\'t delete article!';
            logStandardInfo('fail to delete article');
        } else {
            logStandardInfo('deleted article');
        }
    }
} else {
    $error = 'Wrong http method';
    logStandardInfo('entered with wrong http method');
}

$pageTitle = "Deleted";
$pageContent = template("article/v_delete", ["error" => $error]);
