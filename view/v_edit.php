<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
<?=$messageToUser?>
<form method='post'>
    Title: <br>
    <input type='text' name='title' value=<?=$title?>> <br>
    Article: <br>
    <textarea name='content' placeholder="enter your article"><?=$content?></textarea><br>
    Category:<br>
    <select name='category_id'>
        <?php foreach ($categories as $category): ?>
        <?php if ($category['id'] == $categoryIdInput): ?>
        <option selected value=<?=$category['id']?>><?=$category['name']?></option>
        <?php else:?>
        <option value=<?=$category['id']?>><?=$category['name']?></option>
        <?php endif;?>
        <?php endforeach;?>
    </select>
    <input type='hidden' name='id' value=<?=$id?>>
    <button>Save</button><br>
</form>
<a href='index.php?c=article&id=<?=$id?>'>Cancel</a>
<?php else: ?>
<?=$messageToUser?><br><br>
<?php endif?>
<hr>
<a href="index.php">Move to main page</a>