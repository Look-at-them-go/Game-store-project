@extends('layout')

@section('title','GameStore')

@section('menu')

    <li class="py-2 hover:bg-indigo-300 rounded text-center">
        <a href="/">STORE PAGE</a>
    </li>

    @auth
        @if (auth()->user()->role_id == 1)
            <li class="py-2 hover:bg-indigo-300 rounded text-center">
                <a href="/admin/panel">Admin panel</a>
            </li>
        @endif
        @if (auth()->user()->role_id == 2)
            <li class="py-2 hover:bg-indigo-300 rounded text-center">
                <a href="/manager/panel">Manager panel</a>
            </li>
        @endif
        @if (auth()->user()->role_id == 3)
            <li class="py-2 hover:bg-indigo-300 rounded text-center">
                <a href="/user/library">Library</a>
            </li>
        @endif
    @endauth


@stop

@section('content')
    <div class="container grid grid-cols-3 gap-2 mx-auto">
        @foreach ($games as $game)
                <div class="w-full rounded w-1/2 hover:bg-gray-400 p-3">
                    <a href="/game/{{ $game->id }}">
                        <p class="text-2xl text-center">{{ $game->name }}</p>
                        <img class="object-cover" src="{{ asset('images/'.$game->picture) }}" alt="image">
                        <p class="text-xl text-center">{{ "Price: $" . $game->price }}</p>
                    </a>
                </div>
        @endforeach
    </div>
    
@stop
