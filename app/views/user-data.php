@extends('templates/conectado')


@section('pagetitle')
    meus dados | revi
@endsection

@section('maincontent')
    <div class="container">
        <?php
            $user = $data['user'];
            $numProc = $data['quantProcesses'];
        ?>

        <h1 class="textcenter">meus dados</h1>

        <div class="form-container">

            <div class="container options side-side">
                <div class="content transluscentblock textcenter">
                    <h3 class="textcenter">meu usuário</h3>
                    <input type="text" class="textcenter" readonly value="<?=$user->getLogin()?>">
                    <br><br>
                    Número de processos criados:
                    <br>
                    <b class="numberprocesses"><?=$numProc?></b>
                </div>
            </div>


            <div class="container side-side">
                <div class="content block textcenter">
                    <h3>minhas informações</h3>

                    <?=hasFlash('success') ?
                        '<div class="alert alert-success">'.flash('success').'</div><br>' : ''?>

                    <form action="meusdados" method="post">
                        <input type="text" name="nome" placeholder="Seu nome" value="<?=$user->getName()?>">
                        <input type="email" name="email" placeholder="E-mail" value="<?=$user->getEmail()?>">
                        <label style="display:block;text-align:left;padding-left: 7%; padding-top: 20px;">
                            <input type="checkbox" <?= ($user->getSerialView() == 1) ? "checked" : "" ?> name="serialView"> Exibir etapas do processo em sequência
                        </label>
                        <br>
                        <?=checkInputErrors('nome') || checkInputErrors('email') ?
                            '<div class="alert alert-error">'
                            .(checkInputErrors('nome') ? getInputErrors('nome'):'')
                            .(checkInputErrors('email') ? getInputErrors('email'):'')
                            .'</div><br>' : ''?>

                        <button>Alterar</button>
                    </form>
                </div>

                <div class="content block textcenter">
                    <h3>alterar minha senha</h3>

                    <form action="meusdados/alterarsenha" method="post">
                        <input type="password" name="senhaatual" placeholder="Senha atual">
                        <input type="password" name="novasenha" placeholder="Nova senha">
                        <input type="password" name="confirmarnovasenha" placeholder="Confirmar nova senha">
                        <br>
                        <?=checkInputErrors('senhaatual') || checkInputErrors('novasenha') ||
                            checkInputErrors('confirmarnovasenha') || hasFlash('erroSenha')?
                            '<div class="alert alert-error">'
                            .(checkInputErrors('senhaatual') ? getInputErrors('senhaatual'):'')
                            .(checkInputErrors('novasenha') ? getInputErrors('novasenha'):'')
                            .(checkInputErrors('confirmarnovasenha') ?
                                getInputErrors('confirmarnovasenha'):'')
                            .(hasFlash('erroSenha') ? flash('erroSenha'):'')
                            .'</div><br>' : ''?>
                        <button>Alterar senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection