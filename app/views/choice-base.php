@extends('templates/conectado')


@section('pagetitle')
    Processinho, é você?
@endsection

@section('maincontent')
    <div class="container">
        <h1 class="textcenter">criar processo</h1>
        <span class="progress">
            <progress max="100" value="20"></progress>
        </span>

        <div class="content block">
            <h2>Tasks management</h2>

            Abacaxi
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
            <br>
            Outra fruta
        </div>

        <form action="" method="post">
            <ul class="blocklist">
                <label>
                    <li class="transluscentblock">
                        <input type="radio" name="something" value="a">
                        Astolfo
                    </li>
                </label>
                <label>
                    <li class="transluscentblock">
                        <input type="radio" name="something" value="b">
                        Astolfo
                    </li>
                </label>
                <label>
                    <li class="transluscentblock">
                        <input type="radio" name="something" value="c">
                        Astolfo
                    </li>
                </label>
            </ul>


            <div class="content fit textright comp-align">
                    <button class="btn-white">Confirmar</button>
            </div>
        </form>
    </div>
@endsection