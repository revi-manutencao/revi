<?php
/**
 * Created by PhpStorm.
 * User: renato
 * Date: 23/05/18
 * Time: 13:59
 */

$pathCreateAccount = 'app/views/CreateAccount.php';

?>
<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="login"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../../../assets/styles/arquivados/Login.css">
    <title>Login</title>
</head>
<body>
    <section id="main">
        <header class="mainHeader">Cabeçalho</header>
        <nav class="mainNav">
        </nav>
        <article class="mainContent">
            <section id="mainArticle">
                <sub class="mainArticleContent">
                    <br><br><h2>Auxiliar de processo de desenvolvimento</h2><br>
                    <p>Uma descrição mais completa do que é o sistema, o que ele faz.

                        Também é interessante dizer para quem ele se destina.

                        Realizar uma apresentação completa nesta página é bastante importante.

                        Talvez, quem sabe, utilizar:
                    </p>
                </sub>
                <sub class="login">

                    <br><br><h3>Fazer login</h3>
                    <form action="UserHome.php" method="post">
                        <input type="text" name="login" id="login" placeholder="Usuário"><br>
                        <input type="password" name="password" id="password" placeholder="Senha"><br>
                        <button type="submit" name="Login" id="logar">Logar</button><br>
                        Não tem conta?<br>
                        <a href="/app/views/arquivados/CreateAccount.php">Criar conta</a>
                    </form>
                </sub>
            </section>
        </article>
        <aside class="mainAside">
        </aside>
        <footer class="mainFooter">Rodapé</footer>
    </section>
</body>
</html>