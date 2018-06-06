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
        <h1 class="textcenter">criar processo</h1>
        <span class="progress">
            <div class="progressbar">
                <span class="progressconut" style="width: <?=$percentage?>%;"></span>
            </div>
        </span>

        <form action="" method="post" class="form-container">

            <div class="container side-side">
                <div class="content block">
                    <h2><?=$phase->getName()?></h2>

                    <span class="maintext">
                        <?=nl2br($phase->getDescription())?>
                    </span>
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
        function checkContent(element) {
            var id = element.value;

            $.ajax({
                url: '<?=SYSROOT?>/api/feature/'+id,
                method: 'get',
                dataType: 'json',
                success: function(data) {
                    $('.maintext').html('<h4>'+ data.Feature.name + '</h4>'+data.Feature.description);
                },
                error: function(data) {
                    console.error('Não foi possível obter os dados da opção selecionada.');
                }
            });
        }
    </script>
@endsection