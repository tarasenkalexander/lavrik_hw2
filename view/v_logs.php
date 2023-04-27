<?php foreach ($logfileNames as $logfileName): ?>
<a href='index.php?c=log&logfileName=<?=$logfileName?>'><?=$logfileName?></a><br>
<?php endforeach;?>