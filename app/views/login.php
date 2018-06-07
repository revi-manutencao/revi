@extends('templates/desconectado')


@section('pagetitle')
    entrar | revi
@endsection

@section('maincontent')
    <div class="container">
        <form action="entrar" method="post" id="loginform" class="content block">
            <h1>entrar</h1>

            <br>

            <?=hasFlash('success') ? '<div class="alert alert-success">'.flash('success').'</div><br>' : ''?>

            <input type="text" name="username" placeholder="Nome de usuário" autofocus>
            <input type="password" name="password" placeholder="Senha">
            <?=(hasFlash('error'))? '<div class="alert alert-error">'.flash('error').'</div>':''?>
            <br>
            <button>Entrar</button>

            <br>
            <br>

            <p>
                Não possui conta?
            </p>
            <p><a href="cadastro">Crie uma nova</a></p>
        </form>
    </div>
@endsection