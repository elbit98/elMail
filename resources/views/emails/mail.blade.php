<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://laravel.loc/public/css/mail.css">
    <title>Document</title>
</head>
<body>

<header>
    <p>elMail</p>
</header>

<div class="content">
    <p>{!! $msg !!}</p>
</div>

</body>
</html>
<style>
    p{
        margin: 0;
    }
    header {
        padding: 25px;
        background: #000000;
    }
    header p{
        font-size: 35px;
        color: #eaf945;
        text-align: center;
    }

    .content {
        width: 80%;
        color: #eaf945;
        padding: 10px;
        margin: 40px auto 40px auto;
        background: #000000;
    }
</style>
