@extends('sidebar')

@section('sidebarcontent')
    <a href="<?=route('/meusdados')?>">
        <li id="processos" class="tooltip">
            <img src="<?=asset('images/icons/user.png')?>">
            <span class="tooltiptext">meus dados</span>
        </li>
    </a><a href="<?=route('/criar')?>">
        <li id="novo" class="tooltip">
            <img src="<?=asset('images/icons/plus.png')?>">
            <span class="tooltiptext">criar processo</span>
        </li>
    </a>
    <a href="<?=route('/sair')?>">
        <li id="logout" class="last tooltip">
            <img src="<?=asset('images/icons/signout.png')?>">
            <span class="tooltiptext">sair</span>
        </li>
    </a>
@endsection
