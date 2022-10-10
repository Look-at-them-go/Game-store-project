@extends('layout')

@section('title','Game Page')

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
        <div class="flex flex-row justify-between">
            <div class="rounded order-1">
                <img src="{{ asset('images/'.$game->picture) }}" alt="image">
            </div>
            <div class="order-2">
                <p class="text-2xl break-all p-3">
                    NAME: {{ $game->name }} <br>
                    PUBLISHER: {{ $game->publisher }} <br>
                
                    @foreach ($genres as $genre)
                        @if ($genre->id == $game->genre_id)
                            GENRE: {{ $genre->name }}
                        @endif
                    @endforeach
                    <br>
                    Rating: {{ round($score,2) }} <br>
                    Downloads: {{ $downloads }} <br>

                    DESCRIPTION: <br> {{ $game->description }} <br>
                </p>
            </div>
    
            <div class="order-3">
                @auth
                    @if (!isset($bought['0']->id) and auth()->user()->role_id == 3)
                        <form action="buy" method="post">
                            @csrf
                            <p class="text-xl">${{ $game->price }}</p>
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="BUY">
                        </form>
                    @endif
                    @if (isset($bought['0']->id) and !isset($rated['0']->id) )
                        <p class="text-xl">Give a rating:</p> 
                        <form action="rate" method="post">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <input type="number" name="rating" id="" min="1" max="5">
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit">
                        </form>
                    @endif
                    @if (isset($bought['0']->id))
                        <p class="text-l">Leave a comment:</p> 
                        <form action="comment" method="post">
                            @csrf
                            <input type="hidden" name="game_id" value="{{ $game->id }}">
                            <textarea class="resize-none" name="comment" id="description" cols="30" rows="5"></textarea><br>
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit">
                        </form>
                    @endif
                @endauth
            
                @foreach ($comments as $comment)
                    <div class="flex flex-col  p-3">
                        <div class="flex flex-col">
                            <p>
                                @foreach ($users as $user)
                                    @if ($user->id == $comment->user_id)
                                         {{ $user->name }}
                                    @endif
                                @endforeach
                            </p>
                            <p class="text-xl">{{ $comment->comment }}</p>
                        </div>
                    </div>
                    @auth
                    @if ($comment->user_id == Auth::user()->id)
                        <form action="comment-delete/{{ $comment->id }}" method="get">
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="DELETE">
                        </form>
                    @endif
                    @endauth
                @endforeach
            </div>
        </div>
        
@stop