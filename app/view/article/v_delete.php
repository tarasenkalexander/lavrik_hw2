<?php if ($error != ''): ?>
	<p><?=$error?></p>
<?php else: ?>
	<p>Article deleted successfully!</p>
<?php endif?>
<hr>
<a href=<?=BASE_URL . "/"?>>Move to main page</a>