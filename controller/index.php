<?php
declare (strict_types = 1);

$articles = getArticles();
logStandardInfo();

include('view/v_index.php');