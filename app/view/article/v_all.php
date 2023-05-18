<div class="full-size container-fluid bg-main">
    <header>
        <div class="page-title text-center">
            <h1>
                <?=$pageTitle?>
            </h1>
        </div>
        <nav class="navbar navbar-expand navbar-dark bg-secondary">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "add"?>>Add article</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "logs"?>>View logs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="articles mt-2 align-items-stretch">
        <div class="container">
            <div class="row">
                <?php foreach ($articles as $id => $article): ?>
                <div class="col-4 border border-2">
                    <div class="article">
                        <h2>
                            <?=$article['title']?>
                        </h2>
                        <a href=<?=BASE_URL . "article/$id"?>>Read more</a>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
        </div>
    </section>
    <footer class="bg-footer fixed-bottom text-center">
        2023 &#169; Alex
    </footer>
</div>