@extends('main')

@section('sidebar')
<ul>
    <a href="<?=route('/')?>">
        <li id="home" class="logo"></li>
    </a>

    <a href="<?=route('/sair')?>">
        <li id="login" class="last">Sair</li>
    </a>
</ul>
@endsection
