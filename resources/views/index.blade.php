<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Тестовое задание</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">


    <!-- Styles -->
    <style>

    </style>

</head>

<body>
    <div class="container pt-20">
        <div class="row top">
            <div class="col-5 sities">
                <a href="/belgorod/news">Белгород</a>
                <a href="/kharkiv/news">Харьков</a>
            </div>
            <div class="col-4 search"><input type="text"><input type="submit" value="поиск"></div>
            <div class="col-3 auth">
                <div class="row ">

                    @auth
                    <div class="col"><b>User</b></div>
                    @else
                    <div class="col"><a href="{{ route('login') }}">Войти</a></div>

                    @if (Route::has('register'))
                    <div class="col"><a href="{{ route('register') }}">Регистрация</a>
                        @endif
                    </div>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row menu">
            <div class="col-3">
                <div class="row justify-content-start">
                    <div class="col"><a href="/">Главная</a></div>
                    <div class="col"><a href="/news">Все новости</a></div>
                </div>
            </div>
        </div>
        <div class="row news-list">
            <div>
                <p>Новость 1</p>
                <p>картинка</p>
                <p>краткое описание</p>
            </div>
            <div>
                <p>Новость 2</p>
                <p>картинка</p>
                <p>краткое описание</p>
            </div>
            
        </div>
    </div>

</body>

</html>