@extends('layout')

@section('title','Manager Panel')

@section('menu')

<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/manager/panel/activity">USER ACTIVITY</a>
</li>

<li class="py-2 hover:bg-indigo-300 rounded text-center">
    <a href="/">STORE PAGE</a>
</li>

@stop

@section('content')

    @yield('manager_content')

@stop