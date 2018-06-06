<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>!!section('pagetitle')!!</title>
    <link rel="stylesheet" href="<?=asset('styles/main.css')?>">

    <link rel="shortcut icon" type="image/png" href="<?=asset('images/logo.png')?>">
    <link rel="apple-touch-icon" href="<?=asset('images/logo.png')?>">
</head>
<body>
    <div id="sidebar" class="basecolor">
        !!section('sidebar')!!
    </div>
    <div id="maincontent">
        !!section('maincontent')!!
    </div>

    <div class="cover basecolor"></div>
</body>
</html>