<?php
declare (strict_types = 1);
include 'model/article/articleDbConnection.php';
include 'core/logging.php';

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = intval($_GET['id']);
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

include('view/v_delete.php');