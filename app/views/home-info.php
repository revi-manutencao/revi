@extends('templates/desconectado')

@section('pagetitle')
    revi
@endsection


@section('maincontent')
    <div class="container">
        <div class="content">
            <span id="fulllogo"></span>
            <h3 class="textcenter" style="font-weight: normal;">
                <b>Revi</b>se conceitos, otimize conhecimentos.
            </h3>
            <br>
            <p class="textcenter">
                <b>Revi</b>se seus conceitos e otimize seus conhecimentos em gerência de processo de desenvolvimento
                construindo um passo a passo com as etapas que construimos para ajudar você!
                <br>
                <br>
                <button type="button" onclick="location.href='entrar'">Começe a usar</button>
            </p>
        </div>
    </div>

@endsection