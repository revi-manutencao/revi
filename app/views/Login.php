@extends('templates/desconectado')


@section('pagetitle')
    Entrar no sistemão
@endsection

@section('maincontent')
    <div class="cover" style="background: aquamarine"></div>


    <form action="entrar" method="post" id="loginform">
        <h1>Entrar</h1>
        <br>

        <input type="text" name="username" placeholder="Nome de usuário">
        <input type="password" name="password" placeholder="Senha">
        <br>
        <button>Entrar</button>
    </form>
@endsection