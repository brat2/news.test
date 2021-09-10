@extends('news.layouts.base')
@section('content')
@if($news)
@if($city)
<p class="h2 mb-4">Новости города {{$city->name}}</p>
@else
<p class="h2 mb-4">Все новости</p>
@endif
@foreach($news as $item)
<div class="row">
    <a class="h4" href="{{route('show', ['id' => $item->id])}}">{{$item->title}}</a>
    <p class="lead">{{$item->description}}</p>
    @auth
    @if($item->users->find(auth()->User()->id))
    <a class="favorite btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $item->id])}}">убрать из избранного</a>
    @else
    <a class="favorite btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $item->id])}}">добавить в избранное</a>
    @endif
    @endauth
</div>
<hr>
@endforeach
@endif

@if($other)
<h3 class="mt-4">Другие новости</h3>
@foreach($other as $item)
<div class="row">
<a class="h4" href="{{route('show', ['id' => $item->id])}}">{{$item->title}}</a>
    <p>{{$item->description}}</p>
    @auth
    @if($item->users->find(auth()->User()->id))
    <a class="favorite btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $item->id])}}">убрать из избранного</a>
    @else
    <a class="favorite btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $item->id])}}">добавить в избранное</a>
    @endif
    @endauth
</div>
<hr>
@endforeach
@endif
@endsection