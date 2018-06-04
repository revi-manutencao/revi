@extends('templates/desconectado')


@section('pagetitle')
    Criar conta no sistemão
@endsection

@section('maincontent')
    <div class="container">
        <form action="cadastro" method="post" id="regform" class="content block ">
            <h1>Criar conta</h1>
            <br>

            <input type="text" name="username" placeholder="Nome de usuário">
            <input type="email" name="email" placeholder="E-mail">
            <br><br>
            <input type="password" name="password" placeholder="Senha">
            <input type="password" name="confirmpassword" placeholder="Repita a senha">
            <br>
            <button>Cadastrar</button>
        </form>
    </div>
@endsection