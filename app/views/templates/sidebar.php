@extends('main')


@section('sidebar')
    <ul>
        <a href="<?=route('/')?>" title="Página inicial">
            <li id="home" class="logo">
            </li>
        </a>

        !!section('sidebarcontent')!!
    </ul>
@endsection