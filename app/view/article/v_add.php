<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
	<form method='post'>
		Title: <br>
		<input type='text' name='title'><?=$articleElements['title']?><br>
		Article: <br>
		<textarea name='content' placeholder="enter your article"><?=$articleElements['content']?></textarea><br>
		Category:<br>
		<select name='category'>
		<?php foreach ($categories as $category): ?>
			<option value="<?=$category['id']?>"><?=$category['name']?></option>
		<?php endforeach; ?>
		</select>
		<button>Add</button>
	</form>
<?php else: ?>
	<?=$messageToUser?><br>
	<?php foreach($errors as $error):?>
		<p><?=$error?></p>
	<?php endforeach;?>
	<a href="index.php?c=add">Add one more</a>
<?php endif?>
<hr>
<a href="index.php">Move to main page</a>