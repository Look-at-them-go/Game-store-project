<table class="border-collapse table-auto">
    <tr>
        <th>Purchased Game</th>
        <th>Game Name</th>
        <th>Purchased on</th>
    </tr>
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
