@extends('admin.admin_panel')

@section('title','Add Genre')

@section('admin_content')

<form action="/admin/add-genre" method="post">
    @csrf
    Genre name:
    <input type="text" name="name" id="">
    <input class="p-2 rounded hover:bg-indigo-300 cursor-pointer" type="submit" value="Submit">
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