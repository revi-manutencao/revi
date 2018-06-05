@extends('sidebar')

@section('sidebarcontent')
    <a href="<?=route('/entrar')?>">
        <li id="login" class="last tooltip">
            <img src="<?=asset('images/icons/login.png')?>">
            <span class="tooltiptext">entrar</span>
        </li>
    </a>
@endsection
