@extends('sidebar')

@section('sidebarcontent')
    <li id="login" class="last tooltip">
        <a href="<?=route('/entrar')?>">
            <img src="<?=asset('images/icons/login.png')?>">
        </a>
        <span class="tooltiptext">entrar</span>
    </li>
@endsection
