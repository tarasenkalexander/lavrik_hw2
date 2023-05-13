<?php
declare (strict_types = 1);

function logInfo(string $message): bool
{
    $date = new DateTime();
    file_put_contents('logs/' . $date->format('Y-m-d'), $message, FILE_APPEND);

    return true;
}

function logStandardInfo(string $additionalInformation = ""): bool
{
    return logInfo(getLogMessage($additionalInformation));
}

function getLogMessage(string $additionalInformation = ""): string
{
    $time = date('h:m:s');
    $userIP = $_SERVER['REMOTE_ADDR'];
    $URL = $_SERVER['REQUEST_URI'];
    if (isset($_SERVER['HTTP_REFERER'])) {
        $referer = $_SERVER['HTTP_REFERER'];
    } else {
        $referer = '';
    }

    return "$time|$userIP|$URL|$referer|$additionalInformation" . PHP_EOL;
}