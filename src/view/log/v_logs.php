<?php foreach ($logfileNames as $logfileName): ?>
    <a href=<?=BASE_URL . "log/$logfileName"?>><?=$logfileName?></a><br>
<?php endforeach;?>