<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 23/05/18
 * Time: 14:01
 */
?>
<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="login"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../assets/styles/default.css">
    <title>Criar Conta</title>
</head>
<body>
<section id="main">
    <header class="mainHeader">Cabeçalho</header>
    <article class="mainContent">
        <h3>Criar Conta</h3>
        <form action="Login.php"method="POST">
            <input type="text" name="name" placeholder="Nome"><br>
            <input type="text" name="email" placeholder="Email"><br>
            <input type="text" name="login" placeholder="Login"><br>
            <input type="password" name="password" placeholder="Senha"><br>
            <input type="password" name="confirm-password" placeholder="Confirmação de Senha"><br>
            <button type="submit">Criar</button>
        </form>
    </article>
    <aside class="mainAside">Aside</aside>
    <footer class="mainFooter">Rodapé</footer>
</section>
</body>
</html>
