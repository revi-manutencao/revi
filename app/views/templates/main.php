<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>!!section('pagetitle')!!</title>
    <link rel="stylesheet" href="<?=asset('styles/main.css')?>">
</head>
<body>
    <div id="sidebar" class="linearcolor">
        !!section('sidebar')!!
    </div>
    <div id="maincontent">
        !!section('maincontent')!!
    </div>
</body>
</html>