<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/favicon" href="http://mirafox.com/wp-content/themes/twentyeleven/img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.css" />
    <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.skin.css" />

    <title>Эмулятор тестирования</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        <img src="/views/img/logo.png" alt="Мирафокс тестирование" width="180" title="На главную"/>
    </a>

    <div>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#question_level_modal" href="#">Настройка сложности</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/log/">Результаты</a>
            </li>
        </ul>
    </div>
</nav>

<div class="row">
    <div class="col-md-4 offset-md-4 align-self-sm-center">
        <content>
            <?=$content?>
        </content>
    </div>

</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="http://bootstraptema.ru/plugins/2018/irs/ion.rangeSlider.min.js"></script>
<script src="/views/js/common.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

</body>
</html>