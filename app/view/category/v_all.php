<header class="text-center mb-3">
    <h1><?=$pageTitle?></h1>
</header>
<main>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <td>
                        <strong>Category title</strong>
                    </td>
                    <td>
                        <strong>Edit</strong>
                    </td>
                    <td>
                        <strong>Delete</strong>
                    </td>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <td colspan="3"><a href=<?=BASE_URL . "category/add"?>>Add category</a></td>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td>
                        <p><?=$category['name']?></p>
                    </td>
                    <td>
                        <a href=<?=BASE_URL . "category/" . $category['id'] . "/edit"?>>Edit</a>
                    </td>
                    <td>
                        <a href=<?=BASE_URL . "category/" . $category['id'] . "/delete"?>>Delete</a>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <br><br>
    <a href=<?=BASE_URL?>>Move to main page</a>
</main>
<footer class="fixed-bottom text-center">
    2023 &#169; Alex
</footer>