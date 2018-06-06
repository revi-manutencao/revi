@extends('templates/conectado')


@section('pagetitle')
    meus dados | revi
@endsection

@section('maincontent')
    <div class="container">
        <form action="meusdados" method="post" id="regform" class="content block">
            <h1>meus dados</h1>
            <br>

            <input type="text" name="nomeusuario" placeholder="Nome de usuário"
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
            <button>Atualizar</button>
        </form>
    </div>
@endsection