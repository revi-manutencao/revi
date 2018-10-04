@extends('templates/conectado')


@section('pagetitle')
    criar processo | revi
@endsection

@section('maincontent')
    <div class="container">
        <h1 class="textcenter">criar processo</h1>
        <span class="progress">
            <div class="progressbar">
                <span class="progressconut" style="width: 100%;"></span>
            </div>
        </span>

        <form action="criar" method="post">

            <div class="container">
                <div class="content block textcenter">
                    <h2>Só mais uma coisinha!</h2>

                    <p>
                        Diga-nos agora qual o nome deste seu processo e, se quiser, adicione uma descrição pra ele
                        também!
                    </p>
                    <br>
                    <br>

                    <input type="text" name="nomeprocesso" placeholder="Nome do processo"
                        value="<?=oldVal('nomeprocesso')?>">
                    <br>
                    <textarea name="descricaoprocesso" maxlength="2000"
                          placeholder="Descrição do processo"><?=oldVal('descricaoprocesso')?></textarea>
                    <br>

                    <?=checkInputErrors('nomeprocesso') ?
                        '<div class="alert alert-error">'
                        .(checkInputErrors('nomeprocesso') ? getInputErrors('nomeprocesso'):'')
                        .'</div><br>' : ''?>

                    <button>Finalizar</button>
                </div>
            </div>

        </form>
    </div>
@endsection