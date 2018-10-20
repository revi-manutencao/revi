@extends('templates/desconectado')


@section('pagetitle')
    criar conta | revi
@endsection

@section('maincontent')
    <div class="container">
        <form action="cadastro" method="post" id="regform" class="content block">
            <h1>criar conta</h1>
            <br>

            <input type="text" name="nomeusuario" placeholder="Nome de usuário" maxlength="40"
               value="<?=oldVal('nomeusuario')?>">

            <input type="text" name="nome" placeholder="Seu nome"
                   value="<?=oldVal('nome')?>">

            <input type="email" name="email" placeholder="E-mail"
                value="<?=oldVal('email')?>">

            <br><br>

            <input type="password" name="senha" placeholder="Senha">

            <input type="password" name="confirmasenha" placeholder="Repita a senha">
            <br>
            <?=hasFlash('error') || checkInputErrors('nomeusuario') ||
            checkInputErrors('nome') || checkInputErrors('email') ||
            checkInputErrors('senha')|| checkInputErrors('confirmasenha') ?
                '<div class="alert alert-error">'
                .(checkInputErrors('nomeusuario') ? getInputErrors('nomeusuario'):'')
                .(checkInputErrors('nome') ? getInputErrors('nome'):'')
                .(checkInputErrors('email') ? getInputErrors('email'):'')
                .(checkInputErrors('senha') ? getInputErrors('senha'):'')
                .(checkInputErrors('confirmasenha') ? getInputErrors('confirmasenha'):'')
                .flash('error')
                .'</div><br>' : ''?>
            <button>Cadastrar</button>
        </form>
    </div>
@endsection