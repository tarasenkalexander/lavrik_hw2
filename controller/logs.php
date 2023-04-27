<?php
 $logfileNames = array_diff(scandir('logs'), array('.', '..'));

 include ('view/v_logs.php');