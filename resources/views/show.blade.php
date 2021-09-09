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
                @if($cities)
                @foreach($cities as $item)
                <a href="/{{$item->slug}}/news">{{$item->name}}</a>
                @endforeach
                @endif
            </div>
            <div class="col-4 search"><input type="text"><input type="submit" value="поиск"></div>
            <div class="col-3 auth">
                <div class="row ">

                    @auth
                    <div class="col"><b>{{auth()->User()->name}}</b></div>
                    <div class="col">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('выйти') }}
                            </x-dropdown-link>
                        </form>
                    </div>
                    @else
                    <div class="col"><a href="{{ route('login') }}">Войти</a></div>
                    <div class="col"><a href="{{ route('register') }}">Регистрация</a>
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
            @if($news)

            <div class="row">
                <a href="{{route('show', ['id' => $news->id])}}">{{$news->title}}</a>
                <p>{{$news->description}}</p>
                <a href="{{route('setFavorite', ['id' => $news->id])}}">добавить в избранное</a>
            </div>
            <hr>
            @endif

            @if($similar)
            <h3>Похожие новости</h3>
            @foreach($similar as $item)
            <div class="row">
                <p>{{$item->title}}</p>
                <p>{{$item->description}}</p>
                <a href="{{route('setFavorite', ['id' => $item->id])}}">добавить в избранное</a>
            </div>
            <hr>
            @endforeach
            @endif
        </div>

    </div>

</body>

</html>