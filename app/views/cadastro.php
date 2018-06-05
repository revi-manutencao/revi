@extends('templates/desconectado')


@section('pagetitle')
    Criar conta no sistemão
@endsection

@section('maincontent')
    <div class="container">
        <form action="cadastro" method="post" id="regform" class="content block">
            <h1>Criar conta</h1>
            <br>

            <input type="text" name="username" placeholder="Nome de usuário"
               value="<?=oldVal('username')?>">
            <?=(checkInputErrors('username'))? getInputErrors('username'):''?>

            <input type="text" name="name" placeholder="Seu nome"
                   value="<?=oldVal('name')?>">
            <?=(checkInputErrors('name'))? getInputErrors('name'):''?>

            <input type="email" name="email" placeholder="E-mail"
                value="<?=oldVal('email')?>">
            <?=(checkInputErrors('email'))? getInputErrors('email'):''?>

            <br><br>

            <input type="password" name="password" placeholder="Senha">
            <?=(checkInputErrors('password'))? getInputErrors('password'):''?>

            <input type="password" name="confirmpassword" placeholder="Repita a senha">
            <?=(checkInputErrors('confirmpassword'))? getInputErrors('confirmpassword'):''?>
            <br>
            <?=hasFlash('error')? flash('error').'<br><br>' : ''?>
            <button>Cadastrar</button>
        </form>
    </div>
@endsection