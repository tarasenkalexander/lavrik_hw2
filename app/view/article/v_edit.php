<?php if ($_SERVER['REQUEST_METHOD'] == 'GET'): ?>
    <?=$messageToUser?>
    <form method='post'>
        Title: <br>
        <input type='text' name='title' value="<?=$articleElements['title'];?>"><br>
        Article: <br>
        <textarea name='content' placeholder="enter your article"><?=$articleElements['content'];?></textarea><br>
        Category:<br>
        <select name='category_id'>
            <?php foreach ($categories as $category): ?>
            <?php if ($category['id'] == $articleElements['category_id']): ?>
                <option selected value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php else: ?>
                <option value="<?=$category['id']?>"><?=$category['name']?></option>
            <?php endif;?>
            <?php endforeach;?>
        </select>
        <input type='hidden' name='id' value=<?=$id?>>
        <button>Save</button><br>
    </form>
    <a href=<?=BASE_URL . "article/$id"?>>Cancel</a>
<?php else: ?>
    <?=$messageToUser?><br>
<?php foreach($errors as $error):?>
    <p><?=$error?></p>
<?php endforeach;?>
<?php endif;?>
<hr>
<a href=<?=BASE_URL?>>Move to main page</a>