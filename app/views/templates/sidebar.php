@extends('main')


@section('sidebar')
    <ul>
        <li id="home" class="logo">
            <a href="<?=route('/')?>">
                <img src="<?=asset('images/logo.png')?>" title="Página inicial">
            </a>
        </li>

        !!section('sidebarcontent')!!
    </ul>
@endsection