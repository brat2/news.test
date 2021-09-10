@extends('news.layouts.base')
@section('content')
@if($news)

<div class="row">
    <h3 class="text-center pb-3 pt-3"><a href="{{route('show', ['id' => $news->id])}}">{{$news->title}}</a></h3>

    <div class="row justify-content-center">
        <div class="col-8 text-center"><img src="{{$news->img}}" class="img-fluid"></div>
    </div>
    <p class="lead pt-5">{{$news->text}}</p>
    @auth
    @if($news->users->find(auth()->User()->id))
    <a class="favorite btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $news->id])}}">убрать из избранного</a>
    @else
    <a class="favorite btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $news->id])}}">добавить в избранное</a>
    @endif
    @endauth
</div>

@endif

@if($similar)
<hr>
<p class="h2 mb-4 mt-4">Похожие новости</p>
@foreach($similar as $item)
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