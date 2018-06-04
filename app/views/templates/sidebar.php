@extends('main')


@section('sidebar')
    <ul>
        <a href="<?=route('/')?>">
            <li id="home" class="logo" title="Página inicial">
            </li>
        </a>

        !!section('sidebarcontent')!!
    </ul>
@endsection