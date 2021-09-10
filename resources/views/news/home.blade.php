@extends('news.layouts.base')
@section('content')

<p class="h2 mb-4">Избранные новости</p>
@auth
@if($news->count() > 0)
@foreach($news as $item)
<div class="row">
    <a class="h4" href="{{route('show', ['id' => $item->id])}}">{{$item->title}}</a>
    <p class="lead">{{$item->description}}</p>
    <a class="btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $item->id])}}">убрать из избранного</a>
</div>
<hr>
@endforeach
@else
<div class="h5 bg-warning text-dark p-3 mt-5">Нет избранных новостей</div>
@endif
@else
<div class="h5 bg-warning text-dark p-3 mt-5">Авторизуйтесь, чтобы добавлять новости в избранное</div>
@endauth
@endsection