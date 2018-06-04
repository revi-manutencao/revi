@extends('templates/desconectado')


@section('pagetitle')
    Entrar no sistemão
@endsection

@section('maincontent')
    <div class="container">
        <form action="entrar" method="post" id="loginform" class="content block">
            <h1>Entrar</h1>
            <br>

            <input type="text" name="username" placeholder="Nome de usuário">
            <input type="password" name="password" placeholder="Senha">
            <br>
            <button type="button" onclick="location.href='user';">Entrar</button>

            <br>
            <br>

            <p>
                Não possui conta?
            </p>
            <p><a href="cadastro">Crie uma nova</a></p>
        </form>
    </div>
@endsection