<?php
declare (strict_types = 1);

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!checkId(PARAMS_URL['id'])) {
        header('Location:' . BASE_URL . 'e404');
    } else {
        $id = (int) PARAMS_URL['id'];
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
