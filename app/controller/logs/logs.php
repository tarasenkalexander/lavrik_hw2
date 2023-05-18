<?php
 $logfileNames = array_diff(scandir('logs'), array('.', '..'));

 $pageTitle = "Logs";
 $pageContent = template("log/v_logs", ["logfileNames" => $logfileNames]);