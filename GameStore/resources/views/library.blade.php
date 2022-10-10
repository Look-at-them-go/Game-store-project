@extends('layout')

@section('title','Game Library')

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

    


@endsection

    

@section('content')

    <div class="grid grid-cols-1 mx-auto gap-2 ">
        @foreach ($p_games as $p)
            @foreach ($games as $game )
                @if ($game->id == $p->game_id)
                    <div class="flex flex-row h-36 w-full rounded justify-between hover:bg-gray-400">
                        <img class="object-cover h-full" src="{{ asset('images/'.$game->picture) }}" alt="">
                        <span class="text-2xl pt-12">{{ $game->name }}</span>
                        <button class="text-3xl p-3 p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit">DOWNLOAD</button>
                    </div>
                @endif
            @endforeach
        @endforeach
    </div>
@endsection
