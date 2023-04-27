<?php
declare (strict_types = 1);
include 'model/article/articleDbConnection.php';
include 'core/logging.php';

$articles = getArticles();
logStandardInfo();

include('view/v_index.php');