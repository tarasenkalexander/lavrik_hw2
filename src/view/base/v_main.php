<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?=BASE_URL . "public/css/bootstrap.min.css"?>>
    <link rel="stylesheet" href=<?=BASE_URL . "public/css/style.css"?>>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <title><?=$pageTitle?></title>
</head>

<body>
    <div class="full-size container-fluid bg-main">
        <header>
            <div class="page-title text-center">
                <h3>
                    <?=$pageTitle?>
                </h3>
            </div>
            <nav class="navbar navbar-expand navbar-dark bg-secondary">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=<?=BASE_URL?>>Main page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "article/add"?>>Add
                                    article</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "logs"?>>View logs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "categories"?>>View
                                    categories</a>
                            </li>
                            <?php if($user === null):?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "login"?>>Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "registration"?>>Registration</a>
                                </li>
                            <?php elseif($user !== null):?>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href=<?=BASE_URL . "logout"?>>Logout</a>
                                </li>
                            <?php endif;?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <?=$pageContent?>
        <div class="navbar-fixed-bottom row-fluid">
            <div class="navbar-inner">
                <div class="container">
                    <footer class="fixed-bottom bg-footer text-center">
                        2023 &#169; Alex
                    </footer>
                </div>
            </div>
        </div>
    </div>
    <script src="public/js/bootstrap.bundle.min.js"></script>
</body>

</html>