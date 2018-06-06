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
                echo 'Whoa! Você já tem pelo menos um processo';
            } else
                echo '<div class="content textcenter">'
                    .'<b>Está solitário por aqui</b>. Que tal criar um novo processo?'
                    .'</div>';
        ?>
    </div>
@endsection