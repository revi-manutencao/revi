@extends('main')

@section('sidebar')
<ul>
    <a href="<?=route('/')?>">
        <li id="home" class="logo">LOGO</li>
    </a>

    <a href="<?=route('/entrar')?>">
        <li id="login" class="last">Entrar</li>
    </a>
</ul>
@endsection
