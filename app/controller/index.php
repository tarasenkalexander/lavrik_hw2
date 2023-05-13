<?php
declare (strict_types = 1);

$articles = getArticles();
logStandardInfo();

$pageTitle = "All articles";
$pageContent = template("article/v_index", ["articles" => $articles, "pageTitle" => $pageTitle]);