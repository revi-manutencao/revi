@extends('templates/desconectado')


@section('pagetitle')
    Entrar no sistemão
@endsection

@section('maincontent')
    <div class="cover linearcolor"></div>


    <form action="cadastro" method="post" class="block">
        <h1>Entrar</h1>
        <br>

        <input type="text" name="username" placeholder="Nome de usuário">
        <input type="email" name="email" placeholder="E-mail">
        <br><br>
        <input type="password" name="password" placeholder="Senha">
        <input type="password" name="confirmpassword" placeholder="Repita a senha">
        <br>
        <button>Cadastrar</button>
    </form>
@endsection