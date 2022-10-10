@extends('admin.admin_panel')

@section('title','Edit game')

@section('admin_content')
<form class="space-y-3" action="/admin/edit-game-submit" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $game->id }}">
    Name: 
    <input type="text" name="name" id="" value="{{ $game->name }}"><br>
    Publisher:
    <input type="text" name="publisher" id="" value="{{ $game->publisher }}"><br>
    Price:
    <input type="number" name="price" id="" value="{{ $game->price }}"><br>
    Description: <br>
    <textarea class="resize-none" name="description" id="description" cols="30" rows="5" >{{ $game->description }}</textarea><br>
    Genre:
    <select name="genre_id" id="" >
        @foreach ( $genres as $genre )
            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
        @endforeach
    </select><br>
    Picture:
    <input type="file" name="picture" id="" value="{{ $game->picture }}"><br>
    
    <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit"><br>
</form>

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