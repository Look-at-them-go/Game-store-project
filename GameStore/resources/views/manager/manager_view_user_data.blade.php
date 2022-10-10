@extends('manager.manager_panel')

@section('title','Activity')

@section('manager_content')

<div class="flex flex-row">
    <div class="w-1/2">
        <table class="border-collapse table-auto">
            @foreach ( $activity as $act )
                <tr class="p-3 hover:bg-gray-400">
                @foreach ( $games as $game )
                    @if ($act->game_id == $game->id)
                        <td class="p-3">{{ $act->name }}</td>
                        <td class="p-3">{{ $game->name }}</td>
                        <td class="p-3">{{ $act->date }}</td>
                    @endif
                @endforeach
                </tr> 
            @endforeach
        </table>
    </div>
    <div class="flex flex-col w-1/2  p-3">
        @foreach ($comments as $comment)
            <div class="flex flex-col">
                <p class="text-xl">{{ $comment->comment }}</p>
            </div>
            <form action="/manager/comment-delete/{{ $comment->id }}" method="get">
                <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="DELETE">
            </form>
        @endforeach
    </div>
</div>

@stop