@extends('news.layouts.base')
@section('content')

<p class="h2 mb-4">Результаты поиска</p>

@if($news->count() > 0)
@foreach($news as $item)
<div class="row">
    <a class="h4" href="{{route('show', ['id' => $item->id])}}">{{$item->title}}</a>
    <p class="lead">{{$item->description}}</p>
    
    @if($item->users->find(auth()->User()->id))
    <a class="favorite btn btn-sm btn-secondary col-2 mb-3" href="{{route('setFavorite', ['act' => 'remove', 'id' => $item->id])}}">убрать из избранного</a>
    @else
    <a class="favorite btn btn-sm btn-warning col-2 mb-3" href="{{route('setFavorite', ['act' => 'add', 'id' => $item->id])}}">добавить в избранное</a>
    @endif
</div>
<hr>
@endforeach
@else
<div class="h5 bg-warning text-dark p-3 mt-5">Ничего не найдено</div>
@endif
@endsection