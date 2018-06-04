@extends('sidebar')

@section('sidebarcontent')
    <a href="<?=route('/entrar')?>">
        <li id="login" class="last tooltip">
            <span class="tooltiptext">Entrar</span>
        </li>
    </a>
@endsection
