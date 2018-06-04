@extends('sidebar')

@section('sidebarcontent')
    <a href="<?=route('/')?>">
        <li id="processos" class="tooltip">
            <span class="tooltiptext">Meus processos</span>
        </li>
    </a><a href="<?=route('/novo')?>">
        <li id="novo" class="tooltip">
            <span class="tooltiptext">Novo processo</span>
        </li>
    </a>
    <a href="<?=route('/sair')?>">
        <li id="logout" class="last tooltip">
            <span class="tooltiptext">Sair</span>
        </li>
    </a>
@endsection
