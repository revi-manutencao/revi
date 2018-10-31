@extends('templates/conectado')


@section('pagetitle')
ver processo | revi
@endsection

@section('maincontent')
<div class="container">
    <?php
    $processo = $data['processo'];
    $arrEtapas = $data['arrEtapas'];
    $executedPhases = $data['executedPhases'];
    ?>

    <div class="container side-side">
        <h1 id="full-process-name" class="textcenter"><?= $processo->getName() ?></h1>

        <div class="content">
                <span class="processdate textcenter processinfo">
                    Criado em <?= date('d/m/Y, à\s H:i', strtotime($processo->getCreatedAt())) ?>
                    <br>
                    Última alteração em <?= date('d/m/Y, à\s H:i', strtotime($processo->getUpdatedAt())) ?>
                </span>
            <br>

            <p>
                <?= $processo->getDescription() != '' ?
                    nl2br($processo->getDescription()) :
                    '<i class="textcenter" style="display:block;">Nenhuma descrição disponível</i>' ?>
            </p>

            <div class="textcenter" style="margin-top: 30px;">
                <button class="btn-fit"
                        onclick="location.href='<?= route('processo/' . $processo->getId() . '/editar') ?>'">Editar
                    dados
                </button>
            </div>

        </div>

        <div class="options">
            <ul class="blocklist inline">
                <?php if (count($arrEtapas) > 0)
                    foreach ($arrEtapas as $i => $dados) { ?>
                        <label>
                            <div class="container-floating-right-button">
                                <a class="btn btn-fit" style="margin-right: 10px;"
                                   href='<?= route('processo/' . $processo->getId() . '/editar-etapa/' . $dados['id']) ?>'">
                                Editar
                                </a>
                            </div>
                            <?php
                            $currentRadio = "";
                            foreach ($executedPhases as $executedPhase) {
                                if($executedPhase->getPhaseId() == $dados['id'] && $executedPhase->getExecuted() == 1){
                                    $currentRadio = "checked";
                                    break;
                                }
                            }
                            ?>
                            <input type="checkbox" <?= $currentRadio ?> class="radio" onclick="checkDone(<?= $dados['id'] ?>)"
                                   style="margin: 0 -20px 0 10px;">
                            <li class="transluscentblock" onclick="checkData(<?= $dados['idFeature'] ?>, event)">
                                <span class="blocktitle">
                                    <span class="phasename">
                                        <?= $dados['phase'] ?>
                                    </span>
                                    <?= $dados['nameFeature'] ?>
                                </span>
                            </li>
                        </label>
                    <?php } ?>
            </ul>
        </div>

    </div>

    <div class="container options side-side" id="info">
        <div class="content block">
            <h3 class="textcenter">informações</h3>

            <p id="instruction" class="textcenter">
                Selecione uma etapa para consultar as informações da escolha
            </p>

            <p id="featurecontent"></p>
            <p id="longdesc"></p>
        </div>


        <div class="textcenter">
            <button type="button" class="btn-danger btn-fit"
                    onclick="confirmDelete(<?= $processo->getId() ?>)">Apagar processo
            </button>
        </div>
    </div>
</div>
<script>
    var baseurl = '<?=SYSROOT?>/api/feature/';

    function checkDone(idPhase) {
        var state = $(event.target).prop('checked');
        $.ajax({
            method: 'post',
            data: { idPhase, state },
            dataType: 'json',
            success: function (data) {
                console.log(data)
                return;
                $('#instruction').css('display', 'none');
                $('#featurecontent').html('<h4>' + data.Feature.name + '</h4>' +
                    data.Feature.shortdescription +
                    ((data.Feature.longdescription !== '') ?
                        '<span id="vermais"><br><br>' +
                        '<button type="button" onclick="showMore(' + idFeature + ')">Ver mais</button></span>' : ''));

                $('#longdesc').html('');
            },
            error: function (data) {
                console.error('Não foi possível obter os dados da opção selecionada.');
            }
        });
    }

    function checkData(idFeature, e) {
        e.preventDefault();

        // Realiza um scroll para a seção de informações (útil na versão mobile)
        $('html, body').animate({
            scrollTop: $("#info").offset().top
        }, 300);


        $.ajax({
            url: baseurl + idFeature,
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#instruction').css('display', 'none');
                $('#featurecontent').html('<h4>' + data.Feature.name + '</h4>' +
                    data.Feature.shortdescription +
                    ((data.Feature.longdescription !== '') ?
                        '<span id="vermais"><br><br>' +
                        '<button type="button" onclick="showMore(' + idFeature + ')">Ver mais</button></span>' : ''));

                $('#longdesc').html('');
            },
            error: function (data) {
                console.error('Não foi possível obter os dados da opção selecionada.');
            }
        });
    }

    function showMore(idFeature) {
        $('#vermais').remove();

        $.ajax({
            url: baseurl + idFeature,
            method: 'get',
            dataType: 'json',
            success: function (data) {
                $('#longdesc').html('<br>' + data.Feature.longdescription);
            },
            error: function (data) {
                console.error('Não foi possível obter os dados do objeto.');
            }
        });
    }


    function confirmDelete(id) {
        var url = '<?=route('processo/')?>' + id + '/apagar';

        if (confirm("Tem certeza de que deseja apagar este processo?"))
            location.href = url;
    }
</script>
@endsection