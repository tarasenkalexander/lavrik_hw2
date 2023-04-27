<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $logfileName = $_GET['logfileName'];
    $logInformation = file("logs/$logfileName");
    $logInformationParsed = [];

    foreach ($logInformation as $logLine) {
        $logInformationParsed[] = explode('|', $logLine);
    }
}

include ('view/v_log.php');  