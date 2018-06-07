@extends('sidebar')

@section('sidebarcontent')
    <li id="processos" class="tooltip">
        <a href="<?=route('/meusdados')?>">
            <img src="<?=asset('images/icons/user.png')?>">
        </a>
        <span class="tooltiptext">meus dados</span>
    </li>

    <li id="novo" class="tooltip">
        <a href="<?=route('/criar')?>">
            <img src="<?=asset('images/icons/gears.png')?>">
        </a>
        <span class="tooltiptext">criação</span>
    </li>

    <li id="logout" class="last tooltip">
        <a href="<?=route('/sair')?>">
            <img src="<?=asset('images/icons/logout.png')?>">
        </a>
        <span class="tooltiptext">sair</span>
    </li>
@endsection
