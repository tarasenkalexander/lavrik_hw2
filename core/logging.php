<?php
declare (strict_types = 1);
include_once 'functions.php';

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
