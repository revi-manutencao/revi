@extends('templates/conectado')


@section('pagetitle')
    editar processo | revi
@endsection

@section('maincontent')
    <div class="container">
        <?php
        $processo = $data['processo'];
        ?>
        <h1 class="textcenter">editar processo</h1>

        <form action="<?=route('processo/'.$processo->getId().'/editar')?>" method="post">

            <div class="container">
                <div class="content block textcenter">
                    <p>Diga-nos o novo <b>nome</b> e a nova <b>descrição</b> do seu processo!</p>
                    <br>
                    <input type="text" name="nomeprocesso" placeholder="Nome do processo"
                        value="<?=$processo->getName()?>">
                    <br>
                    <textarea name="descricaoprocesso" maxlength="2000"
                          placeholder="Descrição do processo"><?=$processo->getDescription()?></textarea>
                    <br>

                    <?=checkInputErrors('nomeprocesso') ?
                        '<div class="alert alert-error">'
                        .(checkInputErrors('nomeprocesso') ? getInputErrors('nomeprocesso'):'')
                        .'</div><br>' : ''?>

                    <button type="button" class="btn-nofocus"
                            onclick="location.href='<?=route('processo/'.$processo->getId())?>'">Cancelar</button>
                    <button>Salvar alterações</button>
                </div>
            </div>

        </form>
    </div>
@endsection