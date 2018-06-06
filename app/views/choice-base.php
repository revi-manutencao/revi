@extends('templates/conectado')


@section('pagetitle')
    criar processo | revi
@endsection

@section('maincontent')
    <div class="container">
        <h1 class="textcenter">criar processo</h1>
        <span class="progress">
            <div class="progressbar">
                <span class="progressconut" style="width: 20%;"></span>
            </div>
        </span>

        <form action="" method="post" class="form-container">

            <div class="container side-side">
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
            </div>

            <div class="container options side-side">
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
                            Alberto
                        </li>
                    </label>
                    <label>
                        <li class="transluscentblock">
                            <input type="radio" name="something" value="c">
                            Ambúrgue
                        </li>
                    </label>
                </ul>

                <div class="content fit textcenter comp-align">
                    <button type="button" onclick="location.href='info'">Confirmar</button>
                </div>
            </div>


        </form>
    </div>
@endsection