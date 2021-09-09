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
                @if($sities)
                @foreach($sities as $item)
                <a href="/{{$item->sity->slug}}/news">{{$item->name}}</a>
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
        @if(!empty($favorite))
        <div class="row news-list">
            @foreach($favorite as $item)
            <div>
                <p>{{$item->title}}</p>
                <p>{{$item->img}}</p>
                <p>{{$item->description}}</p>
            </div>
            @endforeach
        </div>
        @endif
    </div>

</body>

</html>