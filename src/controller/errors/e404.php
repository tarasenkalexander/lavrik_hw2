<?php
    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
    $pageTitle = "404 Error";
    $pageContent = template("errors/v_404");