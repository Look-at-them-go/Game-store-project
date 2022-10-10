@extends('admin.admin_panel')

@section('title','Edit Game')

@section('admin_content')

<div class="grid grid-cols-1 content-center">
    <table class="border-collapse table-auto">
        @foreach ($games as $game)
                <tr class="p-3 hover:bg-gray-400">
                    <td class="p-3">{{ $game->name }}</td>
                    <td>
                        <form action="/admin/edit-game/{{ $game->id }}">
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Edit">
                        </form>
                        <form action="/admin/delete-game/{{ $game->id }}" method="get">
                            <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="DELETE">
                        </form>
                    </td>
                </tr>   
        @endforeach
    </table>
</div>

@if (\Session::has('success'))
    <div class="alert alert-success text-green-600">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

<div>
    @if ($errors->any())
        <ul class="text-red-500">
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
        </ul>
    @endif
</div>
@stop