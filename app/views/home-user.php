@extends('templates/conectado')


@section('pagetitle')
    meus processos | revi
@endsection

@section('maincontent')
    <div class="container">
        <h1 class="textcenter">meus processos</h1>
        <?php
            $processos = $data['processos'];

            if(count($processos) > 0) {
                foreach($processos as $processo) {

                    echo '<div class="content textcenter block">';
                    echo '<b>'.(($processo->getName() != null) ? $processo->getName() : '<i>Processo sem nome</i>').'</b>';
                    echo ', atualizado em ' . date('d/m/Y, H:i', strtotime($processo->getUpdatedAt()));
                    echo '</div>';
                }
            } else
                echo '<div class="content textcenter">'
                    .'<b>Está solitário por aqui</b>. Que tal criar um novo processo?'
                    .'</div>';
        ?>
    </div>
@endsection