<?php
declare (strict_types = 1);

if ($user === null) {
    header('Location: ' . BASE_URL . 'login');
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = (int) PARAMS_URL['id'];
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
