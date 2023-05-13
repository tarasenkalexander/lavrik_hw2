<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $logfileName = $_GET['logfileName'];
    $logInformation = file("logs/$logfileName");
    $logInformationParsed = [];

    foreach ($logInformation as $logLine) {
        $logInformationParsed[] = explode('|', $logLine);
    }

    $pageTitle = $logfileName;
    $pageContent = template("log/v_log", [
        "logfileName" => $logfileName,
        "logInformationParsed" => $logInformationParsed
    ]);
}