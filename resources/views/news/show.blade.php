@extends('news.layouts.base')
@section('content')
@if($news)

<div class="row">
    <h3 class="text-center pb-3 pt-3"><a href="{{route('show', ['id' => $news->id])}}">{{$news->title}}</a></h3>

    <div class="row justify-content-center">
        <div class="col-8"><img src="{{$news->img}}" class="img-fluid"></div>
    </div>
    <p class="lead pt-5">{{$news->text}}</p>
    @auth
    @if($news->users->find(auth()->User()->id))
    <a class="btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $news->id])}}">убрать из избранного</a>
    @else
    <a class="btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $news->id])}}">добавить в избранное</a>
    @endif
    @endauth
</div>

@endif

@if($similar)
<h3>Похожие новости</h3>
@foreach($similar as $item)
<div class="row">
    <p>{{$item->title}}</p>
    <p>{{$item->description}}</p>
    @auth
    @if($item->users->find(auth()->User()->id))
    <a class="btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $item->id])}}">убрать из избранного</a>
    @else
    <a class="btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $item->id])}}">добавить в избранное</a>
    @endif
    @endauth
</div>
<hr>
@endforeach
@endif
@endsection