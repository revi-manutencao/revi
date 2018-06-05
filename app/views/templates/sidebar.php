@extends('main')


@section('sidebar')
    <ul>
        <a href="<?=route('/')?>">
            <li id="home" class="logo" title="Página inicial">
                <img src="<?=asset('images/logo.png')?>">
            </li>
        </a>

        !!section('sidebarcontent')!!
    </ul>
@endsection