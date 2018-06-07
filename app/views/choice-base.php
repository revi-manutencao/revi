@extends('templates/conectado')


@section('pagetitle')
    criar processo | revi
@endsection

@section('maincontent')
    <div class="container">
        <?php
        $phase = $data['phase'];
        $features = $data['features'];
        $percentage = $data['percentage'];
        ?>
        <h1 class="textcenter">criação</h1>
        <span class="progress">
            <div class="progressbar">
                <span class="progressconut" style="width: <?=$percentage?>%;"></span>
            </div>
        </span>

        <form action="criar" method="post" class="form-container">

            <div class="container side-side">
                <div class="content block">
                    <h2><?=$phase->getName()?></h2>

                    <p>
                        <?=nl2br($phase->getDescription())?>
                    </p>

                    <p id="shortdesc"></p>
                    <p id="longdesc"></p>
                </div>
            </div>

            <div class="container options side-side">
                <ul class="blocklist">
                    <?php if(count($features) > 0)
                        foreach($features as $i => $feature) { ?>
                        <label>
                            <li class="transluscentblock">
                                <input type="radio" name="choice" value="<?=$feature->getId()?>"
                                       onclick="checkContent(this)">
                                <span class="blocktitle">
                                    <?=$feature->getName()?>
                                </span>
                            </li>
                        </label>
                    <?php } ?>
                </ul>

                <div class="content fit textcenter comp-align">
                    <button>Confirmar</button>
                </div>
            </div>
        </form>
    </div>
    <script>
        var baseurl = '<?=SYSROOT?>/api/feature/';

        function checkContent(element) {
            var id = element.value;

            $.ajax({
                url: baseurl + id,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    $('#shortdesc').html('<br><h4>'+ data.Feature.name + '</h4>'+
                        data.Feature.shortdescription.replace('\n', '<br/>')+
                        '<span id="vermais"><br><br>'+
                        '<button type="button" onclick="showMore('+id+')">Ver mais</button></span>');

                    $('#longdesc').html('');
                },
                error: function(data) {
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
                success: function(data) {
                    $('#longdesc').html('<br>'+data.Feature.longdescription.replace('\n', '<br/>'));
                },
                error: function(data) {
                    console.error('Não foi possível obter os dados do objeto.');
                }
            });
        }
    </script>
@endsection