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
            <h4 class="textcenter">Como usar um processo na criação de um software?</h4>
            <p class="textcenter">
                Com o <b>revi</b> você aprende a aplicação prática de alguns conceitos da gerência de projetos de
                software e, de quebra, ainda constrói um <b>processo</b> para usar na sua empresa ou em seus projetos!
            </p>
            <br>
            <p class="textcenter">
                <button type="button" onclick="location.href='entrar'">Comece a usar</button>
            </p>
        </div>

        <div class="contentdivisor"></div>

        <div class="content">
            <h4>Quem somos?</h4>
            <p>
                Dois alunos de <b>Engenharia de Software</b>, na missão de criar um projeto para uma disciplina da
                graduação, a qual visa a integração dos conhecimentos adquiridos ao longo do curso.
            </p>
            <br>
            <h4>Por quê revi?</h4>
            <p>
                Uma união dos nomes dos criadores, <b>Re</b>nato e <b>Vi</b>nicius, em conjunto com a ideia do
                projeto de permitir aprender e <b>revi</b>sar conteúdos, surgiu então este nome totalmente
                criativo!
            </p>
            <br>
            <h4>Como funciona?</h4>
            <p>
                Depois de conectado à sua conta, você pode criar processos por meio de um <b>simples passo a passo</b>
                dividido em algumas <b>etapas</b>, referentes a conceitos do gerenciamento de projetos.
            </p>
            <p>
                Em cada etapa você escolhe um método de aplicação do <b>conceito abordado</b>, dentre algumas opções
                que mostram instruções para sua aplicação no mundo real. Tudo isso enquanto você está montando <b>seu
                próprio processo!</b>
            </p>
            <p>
                Depois de todas as etapas, você pode nomear e descrever seu processo e <b>voilà!</b> Ele ficará salvo
                e disponível para você consultá-lo - <i>e as instruções escolhidas em cada etapa</i> -
                <b>quando e onde quiser!</b>
            </p>
            <br>
            <p class="textcenter">
                <button type="button" onclick="location.href='entrar'">Conheça</button>
            </p>

        </div>
    </div>

@endsection