<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Тестовое задание</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!--Подключаем библиотеку-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


</head>

<body>
    <div class="container pt-20">
        <div class="row top pt-3 pb-3 bg-light text-dark">
            <div class="col-6 cities">
                @if($cities)
                @foreach($cities as $item)
                <a class="h5 p-2 bd-highlight" href="/{{$item->slug}}/news">{{$item->name}}</a>
                @endforeach
                @endif
            </div>
            <div class="col-6">
                <div class="d-flex flex-row bd-highlight " style="float: right">
                    <div class="search p-2 bd-highlight">
                        <form method="post" action="/search">
                            @csrf
                            <input type="text" name="str"><input type="submit" value="поиск">
                        </form>
                    </div>
                    <div class="auth p-2 bd-highlight">
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
            </div>


        </div>
        <div class="menu pt-3 pb-4  border-bottom">
            <a class="h4 p-2 bd-highlight" href="/">Главная</a>
            <a class="h4 p-2 bd-highlight" href="/news">Все новости</a>
        </div>

        <div class="row news">
            @yield('content')
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {

        $(document).on('click', '.favorite', function(event) {
            event.preventDefault();
            a = this;
            url = $(this).attr('href');
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    const link = new URL($(location).attr('href'));
                    if (data == 'add') {
                        $(a).removeClass("btn-warning");
                        $(a).addClass("btn-secondary");
                        $(a).text("убрать из избранного");
                        $(a).attr('href', url.replace("add", "remove"));
                    }
                    if (data == 'remove') {
                        $(a).removeClass("btn-secondary");
                        $(a).addClass("btn-warning");
                        $(a).text("добавить в избранное");
                        $(a).attr('href', url.replace("remove", "add"));
                        if (link.pathname == '/') {
                            $(a).parent('.row').next('hr').remove();
                            $(a).parent('.row').remove();
                        }
                    }
                },
            });
        });
    });
</script>

</html>