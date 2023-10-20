@extends('stores.layout')

@section('content')
    <h1>Promotions for {{ $store->name }}</h1>
    @if(!is_null($promotions) && count($promotions) > 0)
        <ul>
            @foreach ($promotions as $promotion)
                <li>{{ $promotion->name }} - {{ $promotion->description }}</li>
            @endforeach
        </ul>
    @else
        <p>No promotions available for this store.</p>
    @endif

    <a href="{{ route('stores.attachanddetach', ['store' => $store]) }}" class="btn btn-primary">Attach/Detach Promotions</a>
@endsection
